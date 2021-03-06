<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingData;
use App\Menu;
use App\Slider;
use App\TopLink;
use App\Trainer;
use App\Gallery;
use App\Program;
use App\ProgramPhoto;
use App\ProgramSchedule;
use App\News;
use App\Request AS RequestEntity;
use Mail;
use Monolog\Handler\GelfHandler;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = LandingData::orderBy('id', 'asc')->get();
        $keyArray = [];
        foreach ($collection->toArray() AS $item) {
            $keyArray[$item['key_name']] = $item['key_value'];
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Menu::orderBy('id', 'asc')->get();
        $menuArray = [];
        foreach ($collection->toArray() AS $item) {
            $menuArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Slider::orderBy('id', 'asc')->get();
        $slideArray = [];
        foreach ($collection->toArray() AS $item) {
            $slideArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = TopLink::orderBy('id', 'asc')->get();
        $topLinkArray = [];
        foreach ($collection->toArray() AS $item) {
            $parts = explode(" ", $item['title']);
            $item['title_first_part'] = array_shift($parts);
            $item['title_other'] = implode(" ", $parts);
            $topLinkArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection` */
        $collection = Trainer::orderBy('id', 'asc')->get();
        $trainerArray = [];
        foreach ($collection->toArray() AS $item) {
            $parts = explode(" ", $item['name']);
            $item['name'] = array_pop($parts);
            $item['last_name'] = implode(" ", $parts);
            $item['programs'] = [];
            $trainerArray[$item['id']] = $item;
        }
        unset($collection);

        $collection = Program::orderBy('is_training', 'asc')
            ->orderBy('trainer_id', 'asc')
            ->orderBy('title', 'asc')->get();
        $programArray = [];
        $trainingGroup = [];
        foreach ($collection->toArray() AS $item) {
            $item['trainer'] = $trainerArray[$item['trainer_id']];
            $trainerArray[$item['trainer_id']]['programs'][] = [
                'id' =>  $item['id'],
                'title' => $item['title'],
                'is_training' => $item['is_training']
            ];
            $item['schedule'] = ProgramSchedule::where('program_id', $item['id'])
                ->orderBy('day_of_weak', 'asc')
                ->orderBy('start_time', 'asc')->get();
            $programArray[$item['id']] = $item;
            $programArray[$item['id']]['photo'] = [];

            if ($item['is_training']) {
                $hash = md5(strtolower($item['title']));
                if (!isset($trainingGroup[$hash])) {
                    $trainingGroup[$hash] = [];
                }

                $trainingGroup[$hash][] = [
                    'id' => $item['trainer_id'],
                    'name' => $trainerArray[$item['trainer_id']]['name'],
                    'last_name' => $trainerArray[$item['trainer_id']]['last_name']
                ];
            }
        }
        unset($collection);

        // В последний момент попросили разделить программы
        // на тренировки и нет =( выкручиваюсь
        foreach ($programArray AS &$program) {
            if ($program['is_training']) {
                $hash = md5(strtolower($program['title']));
                if (isset($trainingGroup[$hash])) {
                    $program['trainers'] = $trainingGroup[$hash];
                }
            }
        }

        $collection = ProgramPhoto::orderBy('id', 'asc')->get();
        foreach ($collection->toArray() AS $item) {
            $programArray[$item['program_id']]['photo'][] = $item;
        }
        unset($collection);

        $images = [];
        foreach (Gallery::orderBy('id','asc')->get() AS $item) {
            $images[] = $item;
        }

        $days = ProgramSchedule::$days;

        $schedule = [];
        foreach (ProgramSchedule::orderBy('day_of_weak', 'asc')
            ->orderBy('start_time', 'asc')->get() AS $programSchedule) {
            if (!isset($schedule[$programSchedule['day_of_weak']])) {
                $schedule[$programSchedule['day_of_weak']] = [];
            }
            $schedule[$programSchedule['day_of_weak']][$programSchedule['start_time']]
                = [
                    'id' => $programSchedule['program_id'],
                    'title' => $programArray[$programSchedule['program_id']]['title']
                ];
        }

        $news = News::where('deleted', 0)
            ->orderBy('published_dt', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('welcome', [
            'keys' => $keyArray,
            'menu' => $menuArray,
            'slides' => $slideArray,
            'topLink' => $topLinkArray,
            'trainers' => $trainerArray,
            'images' => $images,
            'programs' => $programArray,
            'days' => $days,
            'schedule' => $schedule,
            'news' => $news
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendRequest(Request $request)
    {
        try {
            $name = $request->input('name');
            $dtBorn = $request->input('dt_born');
            $placeBorn = $request->input('place_born');
            $postAddress = $request->input('post_address');
            $phone = $request->input('phone');
            $email = $request->input('email');

            $requestEntity = new RequestEntity();
            $requestEntity->name = $name;
            $requestEntity->dt_born = $dtBorn;
            $requestEntity->place_born = $placeBorn;
            $requestEntity->post_address = $postAddress;
            $requestEntity->phone = $phone;
            $requestEntity->email = $email;
            $requestEntity->created_at = new \DateTime();

            $requestEntity->save();

            Mail::send('emails.request', ['request'=>$requestEntity], function ($message) {
                $message->from('noreply@gmate.ru', 'Gmate');
                $message->to('gmate.rus@gmail.com')->cc('enot.work@gmail.com');
            });

            return response()->json(['success'=>true]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
    }
}

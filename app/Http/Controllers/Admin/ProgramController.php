<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 21.01.18
 * Time: 23:28
 */
namespace App\Http\Controllers\Admin;

use App\Program;
use App\ProgramPhoto;
use App\ProgramSchedule;
use App\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * Страница списка
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $trainers = Trainer::where('deleted', 0)->orderBy('name','asc')->get();
        return view('admin.programs', ['trainers' => $trainers]);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        $trainers = [];
        foreach (Trainer::where('deleted', 0)->orderBy('name','asc')->get()
            AS $trainer) {
            $trainers[ $trainer['id'] ] = $trainer;
        }
        $programs = [];
        foreach (Program::orderBy('id', 'asc')->get() AS $program) {
            $program['trainer'] = $trainers[ $program['trainer_id'] ];
            $programs[]  = $program;
        }

        return response()->json($programs);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Program::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $program = new Program();
            $program->created_at = new \DateTime();
        } else {
            $program = Program::find($id);
        }
        if (!$program) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $program->trainer_id = $request->input('trainer_id');
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->duration = $request->input('duration');
        $program->is_training = $request->input('is_training', 0);

        $program->updated_at = new \DateTime();

        $program->save();
        return response()
            ->json(['success'=>'true', 'program'=>$program]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = Program::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function scheduleIndex(Request $request, $id)
    {
        $program = Program::find($id);
        return view('admin.schedules', ['program' => $program]);
    }

    /**
     * Массив данных по рассписанию
     * @return mixed
     */
    public function scheduleList(Request $request, $id)
    {
        $programs = [];
        foreach (Program::orderBy('id', 'asc')->get() AS $program) {
            $programs[$program['id']]  = $program['title'];
        }

        $schedules = [];
        foreach (ProgramSchedule::where('program_id', $id)
                     ->orderBy('day_of_weak','asc')->get()
                 AS $schedule) {
            if (isset($programs[$schedule['program_id']])) {
                $schedule['programName'] = $programs[$schedule['program_id']];
            } else {
                $schedule['programName'] = '';
            }

            $schedules[ $schedule['id'] ] = $schedule;
        }
       return response()->json($schedules);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function scheduleSave(Request $request, $id = null)
    {
        if (is_null($id)) {
            $schedule = new ProgramSchedule();
            $schedule->created_at = new \DateTime();
        } else {
            $schedule = ProgramSchedule::find($id);
        }
        if (!$schedule) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $schedule->day_of_weak = $request->input('day_of_weak');
        $schedule->start_time = $request->input('start_time');
        $schedule->program_id = $request->input('program_id');
        $schedule->updated_at = new \DateTime();

        $schedule->save();
        return response()
            ->json(['success'=>'true', 'schedule'=>$schedule]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function scheduleDestroy(Request $request, $id) {
        if ($schedule = ProgramSchedule::find($id)) {
            $schedule->delete();
        }
        return response()->json(['success'=>'true']);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function programPhotoIndex(Request $request, $id)
    {
        $program = Program::find($id);
        return view('admin.programPhoto', ['program' => $program]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function programPhotoList(Request $request, $id)
    {
        $programs = [];
        foreach (Program::orderBy('id', 'asc')->get() AS $program) {
            $programs[$program['id']]  = $program['title'];
        }

        $photos = [];
        foreach (ProgramPhoto::where('program_id', $id)
                     ->orderBy('id','asc')->get()
                 AS $photo) {
            if (isset($programs[$photo['program_id']])) {
                $photo['programName'] = $programs[$photo['program_id']];
            } else {
                $photo['programName'] = '';
            }

            $photos[ $photo['id'] ] = $photo;
        }
        return response()->json($photos);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function programPhotoSave(Request $request, $id = null)
    {
        if (is_null($id)) {
            $photo = new ProgramPhoto();
            $photo->created_at = new \DateTime();
        } else {
            $photo = ProgramPhoto::find($id);
        }
        if (!$photo) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $photo->photo_link = $request->input('photo_link');
        $photo->photo_thumb_link = $request->input('photo_thumb_link');
        $photo->program_id = $request->input('program_id');
        $photo->updated_at = new \DateTime();

        $photo->save();
        return response()
            ->json(['success'=>'true', 'schedule'=>$photo]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function programPhotoDestroy(Request $request, $id) {
        if ($photo = ProgramPhoto::find($id)) {
            $photo->delete();
        }
        return response()->json(['success'=>'true']);
    }
}
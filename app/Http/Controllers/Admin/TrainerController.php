<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 21.01.18
 * Time: 20:03
 */

namespace App\Http\Controllers\Admin;

use App\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController  extends Controller
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
        return view('admin.trainers', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Trainer::where('deleted', 0)
            ->orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Trainer::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $trainer = new Trainer;
            $trainer->created_at = new \DateTime();
        } else {
            $trainer = Trainer::find($id);
        }
        if (!$trainer) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $trainer->photo_link = $request->input('photo_link');
        $trainer->name = $request->input('name');
        $trainer->description = $request->input('description');
        $trainer->updated_at = new \DateTime();

        $trainer->save();
        return response()->json(['success'=>'true', 'trainer'=>$trainer]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($trainer = Trainer::find($id)) {
            $trainer->deleted = 1;
            $trainer->updated_at = new \DateTime();
            $trainer->save();
        }
        return response()->json(['success'=>'true']);
    }
}
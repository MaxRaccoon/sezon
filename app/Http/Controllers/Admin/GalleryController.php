<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 18:36
 */
namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * GalleryController constructor.
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
        return view('admin.gallery', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Gallery::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Gallery::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $gallery = new Gallery;
            $gallery->created_at = new \DateTime();
        } else {
            $gallery = Gallery::find($id);
        }
        if (!$gallery) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

//        $gallery->group_name = $request->input('group_name');
        $gallery->group_name = 'first';
        $gallery->image_link = $request->input('image_link');
        $gallery->image_thumb_link = $request->input('image_thumb_link');
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->updated_at = new \DateTime();

        $gallery->save();
        return response()->json(['success'=>'true', 'gallery'=>$gallery]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = Gallery::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }
}
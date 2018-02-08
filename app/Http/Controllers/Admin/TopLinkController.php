<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 18:36
 */
namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Http\Controllers\Controller;
use App\TopLink;
use Illuminate\Http\Request;

class TopLinkController extends Controller
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
        return view('admin.topLink', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(TopLink::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(TopLink::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $topLink = new TopLink;
        } else {
            $topLink = TopLink::find($id);
        }
        if (!$topLink) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $topLink->image = $request->input('image');
        $topLink->title = $request->input('title');
        $topLink->description = $request->input('description');
        $topLink->link = $request->input('link');
        $topLink->link_title = $request->input('link_title');

        $topLink->save();
        return response()->json(['success'=>'true', 'topLink'=>$topLink]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($topLink = TopLink::find($id)) {
            $topLink->delete();
        }
        return response()->json(['success'=>'true']);
    }
}
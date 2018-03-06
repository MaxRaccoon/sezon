<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 05.03.18
 * Time: 14:43
 */
namespace App\Http\Controllers\Admin;

use App\News;
use App\Http\Controllers\Controller;
use App\NewsPhoto;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        return view('admin.news', ['todayTS' => ( new \DateTime())->getTimestamp() * 1000]);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        $newsList = [];
        foreach (News::where('deleted', 0)->orderBy('published_dt','desc')->get()
                 AS $news) {
            $newsList[ $news['id'] ] = $news;
        }

        return response()->json($newsList);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(News::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $news = new News();
            $news->created_at = new \DateTime();
        } else {
            $news = News::find($id);
        }
        if (!$news) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $news->title = $request->input('title');
        $news->anons = $request->input('anons');
        $news->content = $request->input('content');
        $news->is_action = $request->input('is_action', 0);
        $news->published_dt = new \DateTime($request->input('published_dt'));
        $news->updated_at = new \DateTime();

        $news->save();
        return response()
            ->json(['success'=>'true', 'news'=>$news]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($news = News::find($id)) {
            $news->delete();
        }
        return response()->json(['success'=>'true']);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsPhotoIndex(Request $request, $id)
    {
        $news = News::find($id);
        return view('admin.newsPhoto', ['news' => $news]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function newsPhotoList(Request $request, $id)
    {
        $newsList = [];
        foreach (News::orderBy('id', 'asc')->get() AS $news) {
            $newsList[$news['id']]  = $news['title'];
        }

        $newsPhotos = [];
        foreach (NewsPhoto::where('news_id', $id)
                     ->orderBy('id','asc')->get()
                 AS $photo) {
            if (isset($newsList[$photo['news_id']])) {
                $photo['programName'] = $newsList[$photo['news_id']];
            } else {
                $photo['programName'] = '';
            }

            $newsPhotos[ $photo['id'] ] = $photo;
        }
        return response()->json($newsPhotos);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function newsPhotoSave(Request $request, $id = null)
    {
        if (is_null($id)) {
            $photo = new NewsPhoto();
            $photo->created_at = new \DateTime();
        } else {
            $photo = NewsPhoto::find($id);
        }
        if (!$photo) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $photo->photo_link = $request->input('photo_link');
        $photo->photo_thumb_link = $request->input('photo_thumb_link');
        $photo->news_id = $request->input('news_id');
        $photo->updated_at = new \DateTime();

        $photo->save();
        return response()
            ->json(['success'=>'true', 'schedule'=>$photo]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function newsPhotoDestroy(Request $request, $id) {
        if ($photo = NewsPhoto::find($id)) {
            $photo->delete();
        }
        return response()->json(['success'=>'true']);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 21:17
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    private $allowExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    const UPLOAD_DIR = '/app/public/upload/';
    const PUBLIC_DIR = '/storage/upload/';

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $file = $request->file('file');
        if (!in_array(strtolower($file->getClientOriginalExtension()), $this->allowExtensions)) {
            return response()->json(['success'=>false]);
        }

        $newDir = uniqid() . '/';
        $storageDir = storage_path() . self::UPLOAD_DIR . $newDir;
        $file->move($storageDir, $file->getClientOriginalName());
        // resizing an uploaded file
        $image = Image::make($storageDir . $file->getClientOriginalName());
        switch ($request->file('entity')) {
            case 'product' : $image->resize(100, 100);
                break;
            case 'technology' : $image->resize(100, 100);
                break;
            default : {
                $newWidth = 200;
                if ($image->height() > $image->width()) {
                    $aspect = $image->width() / $image->height();
                    $newHeight = (int)($newWidth / $aspect);
                } else if ($image->height() < $image->width()) {
                    $aspect = $image->height() / $image->width();
                    $newHeight = (int)($newWidth * $aspect);
                } else {
                    $newHeight = 200;
                }
                $image->resize($newWidth, $newHeight);
            }
                break;
        }
        $image->save($storageDir . 'thumb_' . $file->getClientOriginalName());

        return response()->json([
            'image' => self::PUBLIC_DIR . $newDir . $file->getClientOriginalName(),
            'thumb' => self::PUBLIC_DIR . $newDir . 'thumb_' . $file->getClientOriginalName()
        ]);
    }
}
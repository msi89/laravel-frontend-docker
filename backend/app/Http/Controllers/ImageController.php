<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function show(int $width, int $height, string $path)
    {
        try {
            return Image::make(storage_path('app/' . $path))
                ->resize($width, $height)
                ->response();
        } catch (\Exception $th) {
            return response($th->getMessage());
        }
    }

    public function display(string $path)
    {
        try {
            $image =  Image::make(storage_path('app/' . $path));
            if (request()->exists('w') && request()->exists('h')) {
                return $image->resize(request()->get('w'), request()->get('h'))->response();
            }
            return $image->response();
        } catch (\Exception $th) {
            return response($th->getMessage());
        }
    }
}

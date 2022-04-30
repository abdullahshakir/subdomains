<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Gallery;
use App\Models\Theme;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public static function createGallery(CustomValidatorRequest $request)
    {
        try {
            $create = new Gallery;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

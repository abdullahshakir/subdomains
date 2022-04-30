<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\AboutUs;
use App\Models\Theme;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public static function createAbout(CustomValidatorRequest $request)
    {
        try {
            $create = new AboutUs;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

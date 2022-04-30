<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public static function createTheme(CustomValidatorRequest $request)
    {
        try {
            $create = new Theme;
            $create->name = $request->name;
            $create->mode = $request->mode;
            $create->save();
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Service;
use App\Models\Theme;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public static function createService(CustomValidatorRequest $request)
    {
        try {
            $create = new Service;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

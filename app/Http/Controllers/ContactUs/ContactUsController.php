<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\ContactUs;
use App\Models\Theme;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public static function createContactUs(CustomValidatorRequest $request)
    {
        try {
            $create = new ContactUs;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

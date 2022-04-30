<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function creat(CustomValidatorRequest $request)
    {
        try {
            $file = new AboutUs;
            if($request->file()) {
                $name = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $file->name = time() . '_' . $request->file->getClientOriginalName();
                $file->file = '/storage/' . $filePath;
                $file->save();
            }
            return response()->json(['message' => 'created']);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Service;
use App\Models\Theme;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function createForm()
    {
        try {
            return view('backoffice.service.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createService(CustomValidatorRequest $request)
    {
        try {
            $create = new Service;
            Theme::create($create, $request);
            return redirect()->route('view.service', ['data' => Service::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.service.view', with(['data' => Service::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.service.update', with(['data' => Service::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(CustomValidatorRequest $request, $id)
    {
        try {
            return redirect()->route('view.service', ['data' => Service::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Service::findOrFail($id);
            $about->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

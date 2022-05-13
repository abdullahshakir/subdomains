<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\AboutUs;
use App\Models\Theme;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function createForm()
    {
        try {
            return view('backoffice.about.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createAbout(CustomValidatorRequest $request)
    {
        try {
            $create = new AboutUs;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 201);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.about.view', with(['data' => AboutUs::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.about.update', with(['data' => AboutUs::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(CustomValidatorRequest $request, $id)
    {
        try {
            $about = AboutUs::findOrFail($id);
            $input = $request->all();
            $about->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $about->file = '/storage/' . $filePath;
                $about->save();
            }
            return response()->json(['message' => 'updated'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = AboutUs::findOrFail($id);
            $about->delete();
            return redirect()->route('view.about')
                ->with('success','Product deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

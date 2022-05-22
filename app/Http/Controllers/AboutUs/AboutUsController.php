<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
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

    public static function createAbout(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'color' => 'required',
                'description' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new AboutUs;
            $create->fill($data);
            $create->save();
            return redirect()->route('view.about', ['data' => AboutUs::all()]);
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

    public function update(Request  $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'color' => 'required',
                'description' => 'required',
            ]);
            $about = AboutUs::findOrFail($id);
            $input = $request->all();
            $about->fill($input)->save();
            return redirect()->route('view.about', ['data' => AboutUs::all()]);
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
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

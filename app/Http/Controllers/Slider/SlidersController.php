<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Theme;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function createForm()
    {
        try {
            return view('backoffice.slider.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createSlider(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
                'file' => 'required',
            ]);
            $create = new Slider();
            if($request->file()) {
                $name = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
            }
            $create->title = $request->title;
            $create->theme_id = $request->theme_id;
            $create->sub_title = $request->sub_title;
            $create->save();
            return redirect()->route('view.slider', ['data' => Slider::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.slider.view', with(['data' => Slider::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.slider.update', with(['data' => Slider::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
//                'theme_id' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
                'file' => 'required',
            ]);
            $slider = Slider::findOrFail($id);
            $input = $request->all();
            $slider->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $slider->file = '/storage/' . $filePath;
                $slider->save();
            }
            return redirect()->route('view.slider', ['data' => Slider::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();
            return redirect()->route('view.slider')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

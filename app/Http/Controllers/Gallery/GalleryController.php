<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Gallery;
use App\Models\Theme;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function createForm()
    {
        try {
            return view('backoffice.gallery.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createGallery(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'is_center' => 'required',
                'file' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new Gallery;
            $create->fill($data);
            $create->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.gallery', ['data' => Gallery::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.gallery.view', with(['data' => Gallery::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.gallery.update', with(['data' => Gallery::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'is_center' => 'required',
                'file' => 'required',
            ]);
            $service = Gallery::findOrFail($id);
            $input = $request->all();
            $service->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $service->file = '/storage/' . $filePath;
                $service->save();
            }
            return redirect()->route('view.gallery', ['data' => Gallery::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Gallery::findOrFail($id);
            $about->delete();
            return redirect()->route('view.gallery')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

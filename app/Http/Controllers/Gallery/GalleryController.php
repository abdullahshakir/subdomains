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

    public static function createGallery(CustomValidatorRequest $request)
    {
        try {
            $create = new Gallery;
            Theme::create($create, $request);
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

    public function update(CustomValidatorRequest $request, $id)
    {
        try {
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
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

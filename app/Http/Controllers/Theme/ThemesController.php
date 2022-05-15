<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeValidatorRequest;
use App\Models\Theme;
use App\Models\Views;
use Illuminate\Http\Request;

class ThemesController extends Controller
{

    public function testFn()
    {
        return response()->json(['data' => Theme::select('id','name')->get()], 200);
    }

    public function createForm()
    {
        try {
            return view('backoffice.theme.create', with(['data' => Views::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createTheme(ThemeValidatorRequest $request)
    {
        try {
            $create = new Theme;
            if($request->file()) {
                $name = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
            }
            $create->name = $request->name;
            $create->view_id = $request->viewId;
            $create->description = $request->description;
            $create->mode = $request->mode;
            $create->save();
            return redirect()->route('view.theme', ['data' => Views::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.theme.view', with(['data' => Theme::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.theme.update', with(['data' => Theme::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(ThemeValidatorRequest $request, $id)
    {
        try {
            $theme = Theme::findOrFail($id);
            $input = $request->all();
            $theme->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $theme->file = '/storage/' . $filePath;
                $theme->save();
            }
            return redirect()->route('view.theme', ['data' => Theme::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Theme::findOrFail($id);
            $about->delete();
            return redirect()->route('view.theme')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

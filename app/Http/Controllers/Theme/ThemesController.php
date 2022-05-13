<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeValidatorRequest;
use App\Models\Theme;
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
            return view('backoffice.theme.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createTheme(ThemeValidatorRequest $request)
    {
        try {
            $create = new Theme;
            $create->name = $request->name;
            $create->mode = $request->mode;
            $create->save();
            return redirect()->route('view.theme', ['data' => Theme::all()]);
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
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

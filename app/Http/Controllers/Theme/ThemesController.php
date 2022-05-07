<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public static function createTheme(CustomValidatorRequest $request)
    {
        try {
            $create = new Theme;
            $create->name = $request->name;
            $create->mode = $request->mode;
            $create->save();
            return response()->json(['message' => 'created'], 200);
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
            return response()->json(['data' => Theme::where('id', $id)->first()], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(CustomValidatorRequest $request, $id)
    {
        try {

            return response()->json(['data' => Theme::paginate(12)], 200);
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

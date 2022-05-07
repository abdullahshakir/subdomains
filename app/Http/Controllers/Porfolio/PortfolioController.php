<?php

namespace App\Http\Controllers\Porfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Portfolio;
use App\Models\Theme;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public static function createPortfolio(CustomValidatorRequest $request)
    {
        try {
            $create = new Portfolio;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.portfolio.view', with(['data' => Portfolio::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return response()->json(['data' => Portfolio::where('id', $id)->first()], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(CustomValidatorRequest $request, $id)
    {
        try {

            return response()->json(['data' => Portfolio::paginate(12)], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Portfolio::findOrFail($id);
            $about->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

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
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Team;
use App\Models\Theme;

class StaticPagesController extends Controller
{
    public function homePage()
    {
//         return Slider::where('theme_id', $getViewID[0]['theme'][0]['id'])->get();
        $getViewID = Domain::where('name',  $_SERVER['HTTP_HOST'])->with('theme')->get();
        $sliders = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('sliders')->first();
        $services = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('service')->first();
        $feature = Feature::where('theme_id', $getViewID[0]['theme'][0]['id'])->get();
        $withSubService = Service::where('id', $services['service'][0]['id'] ?? 0)->with('subServices')->first();
        $gallery = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('gallery')->first();
        $aboutUs = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('aboutUs')->first();
        $footer = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('footer')->first();
        $team = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('team')->first();
        $withTeamMembers = Team::where('id', $team['team'][0]['id'] ?? 0)->with('teamMembers')->first();
        $portfolio = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('portfolio')->first();
        $distinctType = $portfolio['portfolio']->unique('type');
        $connectivity = Theme::where('id', $getViewID[0]['theme'][0]['id'] ?? 0)->with('connectivity')->first();
        return view('pages.home-page')->with('sliders', $sliders['sliders'] ?? null)
            ->with('withSubService', $withSubService ?? null)->with('gallery', $gallery['gallery'] ?? null)
            ->with('aboutUs', $aboutUs['aboutUs'] ?? null)->with('footer', $footer['footer'][0] ?? null)
            ->with('withTeamMembers', $withTeamMembers ?? null)->with('portfolio', $portfolio ?? null)
            ->with('feature', $feature ?? null)->with('connectivity', $connectivity ?? null)
            ->with('distinctType', $distinctType ?? null);
    }

}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Team;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function homePage()
    {
        $getViewID = Domain::where('user_id', auth()->user()->id)->with('views')->get();
        $sliders = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('sliders')->first();
        $services = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('service')->first();
        $withSubService = Service::where('id', $services['service'][0]['id'])->with('subServices')->first();
        $gallery = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('gallery')->first();
        $aboutUs = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('aboutUs')->first();
        $footer = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('footer')->first();
        $team = Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('team')->first();
        $withTeamMembers = Team::where('id', $team['team'][0]['id'])->with('teamMembers')->first();
        return view('pages.home-page')->with('sliders', $sliders['sliders'])
            ->with('withSubService', $withSubService)->with('gallery', $gallery['gallery'])
            ->with('aboutUs', $aboutUs['aboutUs'])->with('footer', $footer['footer'][0])
            ->with('withTeamMembers', $withTeamMembers);
    }

}

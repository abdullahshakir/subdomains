<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function homePage()
    {
        $getViewID = Domain::where('user_id', auth()->user()->id)->with('views')->get();
      return  Theme::where('view_id', $getViewID[0]['views'][0]['id'])->with('team')->get();
        return User::with('domain')->get();
        return view('pages.home-page');
    }

}

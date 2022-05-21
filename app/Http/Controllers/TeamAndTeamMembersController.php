<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Theme;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class TeamAndTeamMembersController extends Controller
{
    public function createForm()
    {
        try {
            return view('backoffice.team.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function createTeamMembersForm()
    {
        try {
            return view('backoffice.team.members.create', with(['data' => Team::select('id','title')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createTeam(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new Team();
            $create->fill($data);
            $create->save();
            return redirect()->route('view.team', ['data' => Team::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createTeamMembers(Request $request)
    {
        try {
            $request->validate([
                'team_id' => 'required',
                'name' => 'required',
                'file' => 'required',
                'designation' => 'required',
                'facebook_link' => 'required',
                'google_link' => 'required',
                'twitter_link' => 'required',
                'description' => 'required',
            ]);
            $create = new TeamMember();
            $input = $request->all();
            $create->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.team', ['data' => TeamMember::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.team.view',
                with(['data' => Team::all(), 'teamMembers' => TeamMember::with('team')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.team.update', with(['data' => Team::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function editTeamMembers($id)
    {
        try {
            return view('backoffice.team.members.update', with(['data' => TeamMember::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'sub_title' => 'required',
            ]);
            $team = Team::findOrFail($id);
            $input = $request->all();
            $team->fill($input)->save();
            return redirect()->route('view.team', ['data' => Team::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateTeamMembers(Request $request, $id)
    {
        try {
            $request->validate([
//                'team_id' => 'required',
                'name' => 'required',
                'file' => 'required',
                'designation' => 'required',
                'facebook_link' => 'required',
                'google_link' => 'required',
                'twitter_link' => 'required',
                'description' => 'required',
            ]);
            $create = TeamMember::findOrFail($id);
            $input = $request->all();
            $create->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.team',
                ['data' => Team::all(), 'teamMembers' => TeamMember::with('team')->get()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $title = Team::where('id', $id)->first();
            if (Team::where('title', $title->title ?? 'no@#!')->exists()) {
                $team = Team::findOrFail($id);
                $team->delete();
            } else {
                $team = TeamMember::findOrFail($id);
                $team->delete();
            }
            return redirect()->route('view.team')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public static function home()
    {
        return view('home');
    }

    public static function home1()
    {
        return view('home1');
    }

    public static function home2()
    {
        return view('home2');
    }

    public static function home3()
    {
        return view('home3');
    }

    public function createForm()
    {
        try {
            return view('backoffice.domain.create', with(['data' => Domain::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createDomain(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            Domain::create([
                'name' => $request->name,
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('view.domain', ['data' => Domain::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.domain.view', with(['data' => Domain::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.domain.update', with(['data' => Domain::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            Domain::where('id', $id)->update([
                'name' => $request->name,
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('view.domain', ['data' => Domain::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Domain::findOrFail($id);
            $about->delete();
            return redirect()->route('view.domain')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

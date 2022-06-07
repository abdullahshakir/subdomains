<?php

namespace App\Http\Controllers\subdomain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;

class SubDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('backoffice.theme.view', with(['data' => Theme::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('backoffice.theme.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            Theme::create([     
                'name' => $request->name,
                'created_by' => auth()->user()->id,
            ]);
            return redirect()->route('sub-domain.index', ['data' => Theme::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return view('backoffice.theme.view', with(['data' => Theme::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            return view('backoffice.theme.update', with(['data' => Theme::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            Theme::where('id', $id)->update([
                'name' => $request->name,
                'created_by' => auth()->user()->id,
            ]);
            return redirect()->route('view.theme', ['data' => Theme::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $theme = Theme::findOrFail($id);
            $theme->delete();
            return redirect()->route('sub-domain')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

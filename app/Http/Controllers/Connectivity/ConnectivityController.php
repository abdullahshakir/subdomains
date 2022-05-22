<?php

namespace App\Http\Controllers\Connectivity;

use App\Http\Controllers\Controller;
use App\Models\Connectivity;
use App\Models\Theme;
use Illuminate\Http\Request;

class ConnectivityController extends Controller
{
    public function createForm()
    {
        try {
            return view('backoffice.connectivity.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createConnectivity(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'file' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new Connectivity();
            $create->fill($data);
            $create->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.connectivity', ['data' => Connectivity::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.connectivity.view', with(['data' => Connectivity::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.connectivity.update', with(['data' => Connectivity::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'file' => 'required',
            ]);
            $feature = Connectivity::findOrFail($id);
            $input = $request->all();
            $feature->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $feature->file = '/storage/' . $filePath;
                $feature->save();
            }
            return redirect()->route('view.connectivity', ['data' => Connectivity::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Connectivity::findOrFail($id);
            $about->delete();
            return redirect()->route('view.feature')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

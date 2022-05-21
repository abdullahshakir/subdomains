<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Theme;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function createForm()
    {
        try {
            return view('backoffice.service.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function createSubServiceForm()
    {
        try {
            return view('backoffice.service.sub.create', with(['data' => Service::select('id','title')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createService(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'sub_title' => 'required',
                'file' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new Service();
            $create->fill($data);
            $create->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            } return redirect()->route('view.service', ['data' => Service::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createSubService(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required',
                'title' => 'required',
                'icon' => 'required',
                'description' => 'required',
            ]);
            $create = new SubService();
            $input = $request->all();
            $create->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->icon->getClientOriginalName();
                $filePath = $request->file('icon')->storeAs('uploads', $name, 'public');
                $create->icon = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.service', ['data' => SubService::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.service.view',
                with(['data' => Service::all(), 'subService' => SubService::with('service')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.service.update', with(['data' => Service::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function editSubServices($id)
    {
        try {
            return view('backoffice.service.sub.update', with(['data' => SubService::where('id', $id)->first()]));
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
                'file' => 'required',
            ]);
            $service = Service::findOrFail($id);
            $input = $request->all();
            $service->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $service->icon = '/storage/' . $filePath;
                $service->save();
            }
            return redirect()->route('view.service', ['data' => Service::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateSubService(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'icon' => 'required',
            ]);
            $create = SubService::findOrFail($id);
            $input = $request->all();
            $create->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->icon->getClientOriginalName();
                $filePath = $request->file('icon')->storeAs('uploads', $name, 'public');
                $create->icon = '/storage/' . $filePath;
                $create->save();
            }
            return redirect()->route('view.service',
                ['data' => Service::all(), 'subServices' => SubService::with('service')->get()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $title = Service::where('id', $id)->first();
            if (Service::where('title', $title->title ?? 'no@#!')->exists()) {
                $team = Service::findOrFail($id);
                $team->delete();
            } else {
                $team = SubService::findOrFail($id);
                $team->delete();
            }
            return redirect()->route('view.service')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

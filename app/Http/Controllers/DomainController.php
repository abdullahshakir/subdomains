<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Theme;
use App\Models\DomainSection;
use Illuminate\Http\Request;
use App\Http\Requests\Domain\CreateDomainRequest;
use App\Http\Requests\Domain\UpdateDomainRequest;

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
            return view('backoffice.domain.create', with(['data' => Theme::select('id', 'name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createDomain(CreateDomainRequest $request)
    {
        try {
            $data =  $request->validated();
            $theme = Theme::find($data['theme_id']);
            $domain = $theme->domains()->create([
                'title' => $data['title'],
                'url' => $data['url'],
                'created_by' => auth()->user()->id
            ]);
            foreach ($theme->themeSections as $section) {
                $domain->sections()->create([
                    'name' => $section->name,
                    'route' => $section->route,
                    'controller' => $section->controller,
                    'attributes_data' => []
                ]);
            }
            return redirect()->route('view.domain', ['data' => Domain::all()]);
            // $request->validate([
            //     'title' => 'required',
            //     'url' => 'required',
            //     'theme_id' => 'required',
            // ]);
            // $domain = new Domain;
            // $domain->title = $request->title;
            // $domain->url = $request->url;
            // $domain->theme_id = $request->theme_id;
            // $domain->created_by = auth()->user()->id;
            // $domain->save();
            // foreach ($domain->theme->themeSections as $section) {
            //     DomainSection::create([
            //         'domain_id' => $domain->id,
            //         'name' => $section->name,
            //         'route' => $section->route,
            //         'controller' => $section->controller,
            //         'attributes_data' => []
            //     ]);
            // };
            // return redirect()->route('view.domain', ['data' => Domain::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.domain.view', with(['data' => Domain::where('created_by', auth()->user()->id)
                ->with('theme')->get()]));
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

    public function update(UpdateDomainRequest $request, $id)
    {
        try {
            $data = $request->validated();
            Domain::where('id', $id)->update([
                'name' => $data['name'],
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('view.domain', ['data' => Domain::all()]);
            // $request->validate([
            //     'name' => 'required',
            // ]);
            // Domain::where('id', $id)->update([
            //     'name' => $request->name,
            //     'user_id' => auth()->user()->id,
            // ]);
            // return redirect()->route('view.domain', ['data' => Domain::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $domain = Domain::findOrFail($id);
            $domain->delete();
            return redirect()->route('view.domain')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

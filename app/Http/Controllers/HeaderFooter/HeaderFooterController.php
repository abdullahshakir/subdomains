<?php

namespace App\Http\Controllers\HeaderFooter;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterValidatorRequest;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Theme;
use Illuminate\Http\Request;

class HeaderFooterController extends Controller
{

    public function createForm()
    {
        try {
            return view('backoffice.footer.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createFooter(FooterValidatorRequest $request)
    {
        try {
            $data = $request->except('_token');
            $create = new Footer();
            $create->fill($data);
            $create->save();
            return redirect()->route('view.footer', ['data' => Theme::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.footer.view', with(['data' => Footer::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.footer.update', with(['data' => Footer::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(FooterValidatorRequest $request, $id)
    {
        try {
            $about = Footer::findOrFail($id);
            $input = $request->all();
            $about->fill($input)->save();
            return redirect()->route('view.footer', ['data' => Footer::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Footer::findOrFail($id);
            $about->delete();
            return redirect()->route('view.footer')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function createFormHeader()
    {
        try {
            return view('backoffice.header.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createHeader(Request $request)
    {
        try {
            $data = $request->except('_token');
            $create = new Header();
            $create->fill($data);
            $create->save();
            return redirect()->route('view.header', ['data' => Theme::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function viewHeader(Request $request)
    {
        try {
            return view('backoffice.header.view', with(['data' => Header::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function editHeader($id)
    {
        try {
            return view('backoffice.header.update', with(['data' => Header::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateHeader(Request $request, $id)
    {
        try {
            $about = Header::findOrFail($id);
            $input = $request->all();
            $about->fill($input)->save();
            return redirect()->route('view.header', ['data' => Header::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deleteHeader($id)
    {
        try {
            $about = Header::findOrFail($id);
            $about->delete();
            return redirect()->route('view.header')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

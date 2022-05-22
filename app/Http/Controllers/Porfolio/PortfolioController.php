<?php

namespace App\Http\Controllers\Porfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\Portfolio;
use App\Models\Theme;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function createForm()
    {
        try {
            return view('backoffice.portfolio.create', with(['data' => Theme::select('id','name')->get()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createPortfolio(Request $request)
    {
        try {
            $request->validate([
                'theme_id' => 'required',
                'title' => 'required',
                'type' => 'required',
                'file' => 'required',
                'category' => 'required',
            ]);
            $data = $request->except('_token');
            $create = new Portfolio;
            $create->fill($data);
            $create->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $create->file = '/storage/' . $filePath;
                $create->save();
            }            return redirect()->route('view.portfolio', ['data' => Portfolio::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.portfolio.view', with(['data' => Portfolio::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return view('backoffice.portfolio.update', with(['data' => Portfolio::where('id', $id)->first()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'type' => 'required',
                'file' => 'required',
                'category' => 'required',
            ]);
            $portfolio = Portfolio::findOrFail($id);
            $input = $request->all();
            $portfolio->fill($input)->save();
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $portfolio->file = '/storage/' . $filePath;
                $portfolio->save();
            }
            return redirect()->route('view.portfolio', ['data' => Portfolio::all()]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = Portfolio::findOrFail($id);
            $about->delete();
            return redirect()->route('view.portfolio')
                ->with('success','Deleted successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}

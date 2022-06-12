<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\DomainSection;
use Exception;

class SliderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // $attributes = DomainSection::where('name', 'slider')->select('attributes_data')->first();
            // $decodedFrom = json_decode($attributes['attributes_data'], true);
            // $data = ['tilte' => $decodedFrom[0], 'sub_title' => $decodedFrom[1], 'file' => $decodedFrom[2]];
            // return collect($data);
            return view('backoffice.slider.view', with(['data' => []]));
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
            return view('backoffice.slider.create', with(['data' => []]));
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
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('slider', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $jsonData = ['title' => $request->title, 'sub_title' => $request->sub_title, 'file' => $file];
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'slider')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $data = [
                (object)$jsonData, 
                (object)$decodedFrom
            ];
            $removeArray = $data;
            DomainSection::where([['domain_id', $domainId->id], ['name', 'slider']])->update([
                'attributes_data' => json_encode($data),
            ]);
            $attributes = DomainSection::where('name', 'slider')->select('attributes_data')->first();
         return   $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('sliders.index', ['data' => [$decodedFrom]]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

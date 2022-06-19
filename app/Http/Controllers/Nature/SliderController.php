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
            $attributes = DomainSection::where('name', 'slider')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return view('backoffice.slider.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
    public function store(Request $request, Domain $domain)
    {
        try {
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('slider', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $jsonData = ['title' => $request->title, 'sub_title' => $request->sub_title, 'file' => $file];
            $prevJsonData = ['first' => $jsonData]; 
            $domainId = Domain::where('url', $request->domain_name)->first();
        //     $sliderSection = $domain->sections()->where('name', 'slider')->first();
        //    return  $attributesData = $sliderSection->attributes_data;
        //     array_push($attributesData, $jsonData);
        //     $sliderSection->update([
        //         'attributes_data' => $attributesData
        //     ]);
            $previousAttributes = DomainSection::where([['domain_id', $domainId->id], ['name', 'slider']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $domainId->id], ['name', 'slider']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where('name', 'slider')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('domain.'.$domainId->id.'.sliders.index', ['data' => [$decodedFrom]]);
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
    public function edit($domainId, $sliderId)
    {
        try {
            $previousAttributes = DomainSection::where('name', 'slider')->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.slider.update', with(['data' => $decodedFrom[$sliderId]]));
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
    public function update(Request $request, $id, $updateId)
    {
        try {
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('slider', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where([['domain_id', $domainId->id], ['name', 'slider']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['title'] = $request->title;
            $decodedFrom[$updateId]['sub_title'] = $request->sub_title;
            $decodedFrom[$updateId]['file'] = $file;
            DomainSection::where([['domain_id', $domainId->id], ['name', 'slider']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where('name', 'slider')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('sliders.index', ['data' => [$decodedFrom]]);
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
        //
    }
}

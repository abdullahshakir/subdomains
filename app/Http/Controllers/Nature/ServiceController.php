<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Domain;
use App\Models\DomainSection;
use Redirect;
use Exception;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domainId)
    {
        try {
            $attributes = DomainSection::where([['domain_id', $domainId], ['name', 'service']])->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return view('backoffice.service.view', with(['subService' => [], 'data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.service.create', with(['data' => []]));
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
            $file = Storage::disk('s3')->put('images', $request->file);
            $file = Storage::disk('s3')->url($file);   
            $jsonData = ['title' => $request->title, 'description' => $request->description, 'file' => $file];
            $prevJsonData = ['first' => $jsonData]; 
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }            
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/services')->with('data', $decodedFrom);
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
    public function edit($domainId, $serviceId)
    {
        try {
            $previousAttributes = DomainSection::where([['domain_id', $domainId], ['name', 'service']])->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'] ?? null, true);
            return view('backoffice.service.update', with(['data' => $decodedFrom[$serviceId]]));
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
            $file = Storage::disk('s3')->put('images', $request->file);
            $file = Storage::disk('s3')->url($file);   
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['title'] = $request->title;
            $decodedFrom[$updateId]['description'] = $request->description;
            $decodedFrom[$updateId]['file'] = $file;
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'service']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/services')->with('data', $decodedFrom);
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

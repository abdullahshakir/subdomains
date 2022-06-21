<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\Storage;
use App\Models\DomainSection;
use Exception;
use Redirect;

class ConnectivityController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domainId)
    {
        try {
            $attributes = DomainSection::where([['domain_id', $domainId], ['name', 'connectivity']])->first();
            $decodedFrom = json_decode($attributes['attributes_data'] ?? null, true);
            return view('backoffice.connectivity.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.connectivity.create', with(['data' => []]));
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
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/connectivities')->with('data', $decodedFrom);
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
    public function edit($domainId, $connectivityId)
    {
        try {
            $previousAttributes = DomainSection::where([['domain_id', $domainId], ['name', 'connectivity']])->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.connectivity.update', with(['data' => $decodedFrom[$connectivityId]]));
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
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['title'] = $request->title;
            $decodedFrom[$updateId]['description'] = $request->description;
            $decodedFrom[$updateId]['file'] = $file;
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'connectivity']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/connectivities')->with('data', $decodedFrom);
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

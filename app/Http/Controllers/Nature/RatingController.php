<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\Storage;
use App\Models\DomainSection;
use Redirect;
use Exception;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domainId)
    {
        try {
            $attributes = DomainSection::where([['domain_id', $domainId], ['name', 'rating']])->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return view('backoffice.rating.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.rating.create', with(['data' => []]));
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
            $jsonData = ['strength' => $request->strength, 'description' => $request->description, 'file' => $file];
            $prevJsonData = ['first' => $jsonData]; 
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/ratings')->with('data', $decodedFrom);
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
    public function edit($domainId, $ratingId)
    {
        try {
            $previousAttributes = DomainSection::where([['domain_id', $domainId], ['name', 'rating']])->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.rating.update', with(['data' => $decodedFrom[$ratingId]]));
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
            $previousAttributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['strength'] = $request->strength;
            $decodedFrom[$updateId]['description'] = $request->description;
            $decodedFrom[$updateId]['file'] = $file;
            DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where([['domain_id', $request->domain_id], ['name', 'rating']])->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return  Redirect::to('domains/'.$request->domain_id.'/ratings')->with('data', $decodedFrom);
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

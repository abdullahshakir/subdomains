<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\DomainSection;
use Exception;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domainId)
    {
        try {
            $attributes = DomainSection::where([['domain_id', $domainId], ['name', 'about']])->first();
            $decodedFrom = json_decode($attributes['attributes_data'] ?? null, true);
            return view('backoffice.about.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.about.create', with(['data' => []]));
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
            $jsonData = ['title' => $request->title, 'description' => $request->description, 'color' => $request->color];
            $prevJsonData = ['first' => $jsonData]; 
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'about')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $domainId->id], ['name', 'about']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where('name', 'about')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->url('domains/{domain}/connectivities', ['data' => [$decodedFrom]]);
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
    public function edit($domainId, $aboutId)
    {
        try {
            $previousAttributes = DomainSection::where('name', 'about')->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.about.update', with(['data' => $decodedFrom[$aboutId]]));
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
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'about')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['title'] = $request->title;
            $decodedFrom[$updateId]['description'] = $request->description;
            $decodedFrom[$updateId]['color'] = $request->color;
            DomainSection::where([['domain_id', $domainId->id], ['name', 'about']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where('name', 'about')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('connectivities.index', ['data' => [$decodedFrom]]);
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

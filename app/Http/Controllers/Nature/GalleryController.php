<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\DomainSection;
use Illuminate\Support\Str;
use Exception;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domainId)
    {
        try {
            $attributes = DomainSection::where([['domain_id', $domainId], ['name', 'gallery']])->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return view('backoffice.gallery.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.gallery.create', with(['data' => []]));
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
                $filePath = $request->file('file')->storeAs('gallery', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $jsonData = ['is_center' => $request->is_center, 'file' => $file];
            $prevJsonData = ['first' => $jsonData]; 
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'gallery')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $domainId->id], ['name', 'gallery']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where('name', 'gallery')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('galleries.index', ['data' => [$decodedFrom]]);
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
    public function edit($domainId, $galleryId)
    {
        try {
            $previousAttributes = DomainSection::where('name', 'gallery')->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.gallery.update', with(['data' => $decodedFrom[$galleryId]]));
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
                $filePath = $request->file('file')->storeAs('gallery', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'gallery')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['is_center'] = $request->is_center;
            $decodedFrom[$updateId]['file'] = $file;
            DomainSection::where([['domain_id', $domainId->id], ['name', 'gallery']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where('name', 'gallery')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('galleries.index', ['data' => [$decodedFrom]]);
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

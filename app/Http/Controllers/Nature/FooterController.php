<?php

namespace App\Http\Controllers\Nature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\DomainSection;
use Exception;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $attributes = DomainSection::where('name', 'footer')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return view('backoffice.footer.view', with(['data' => $decodedFrom, 'attributes' => $attributes]));
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
            return view('backoffice.footer.create', with(['data' => []]));
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
            $jsonData = ['address_title' => $request->address_title, 'description' => $request->description, 'address' => $request->address,
            'phone' => $request->phone,'fax' => $request->fax, 'email' => $request->email, 'total_download' => $request->total_download,
            'download_text' => $request->download_text,'total_client' => $request->total_client, 'client_text' => $request->client_text,
            'subscribe_description' => $request->subscribe_description, 'facebook_link' => $request->facebook_link, 'subscriber_link' => $request->subscriber_link,
            'privacy_link' => $request->privacy_link, 'term_link' => $request->term_link, 'pinterest_link' => $request->pinterest_link, 'yahoo_link' => $request->yahoo_link];
            $prevJsonData = ['first' => $jsonData]; 
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'footer')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            if($decodedFrom){
                foreach($decodedFrom as $key => $item) {
                    array_push($prevJsonData , $item) ;
                }
            }
            DomainSection::where([['domain_id', $domainId->id], ['name', 'footer']])->update([
                'attributes_data' => json_encode($prevJsonData),
            ]);
            $attributes = DomainSection::where('name', 'footer')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('footers.index', ['data' => [$decodedFrom]]);
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
    public function edit($id, $footerId)
    {
        try {
            $previousAttributes = DomainSection::where('name', 'footer')->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.footer.update', with(['data' => $decodedFrom[$footerId]]));
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
            $previousAttributes = DomainSection::where('name', 'footer')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$updateId]['address_title'] = $request->address_title;
            $decodedFrom[$updateId]['description'] = $request->description;
            $decodedFrom[$updateId]['address'] = $request->address;
            $decodedFrom[$updateId]['phone'] = $request->phone;
            $decodedFrom[$updateId]['email'] = $request->email;
            $decodedFrom[$updateId]['fax'] = $request->fax;
            $decodedFrom[$updateId]['total_download'] = $request->total_download;
            $decodedFrom[$updateId]['download_text'] = $request->download_text;
            $decodedFrom[$updateId]['total_client'] = $request->total_client;
            $decodedFrom[$updateId]['client_text'] = $request->client_text;
            $decodedFrom[$updateId]['subscribe_description'] = $request->subscribe_description;
            $decodedFrom[$updateId]['facebook_link'] = $request->facebook_link;
            $decodedFrom[$updateId]['subscriber_link'] = $request->subscriber_link;
            $decodedFrom[$updateId]['privacy_link'] = $request->privacy_link;
            $decodedFrom[$updateId]['term_link'] = $request->term_link;
            $decodedFrom[$updateId]['pinterest_link'] = $request->pinterest_link;
            $decodedFrom[$updateId]['yahoo_link'] = $request->yahoo_link;
            DomainSection::where([['domain_id', $domainId->id], ['name', 'footer']])->update([
                'attributes_data' => json_encode($decodedFrom),
            ]);
            $attributes = DomainSection::where('name', 'footer')->select('attributes_data')->first();
            $decodedFrom = json_decode($attributes['attributes_data'], true);
            return redirect()->route('footers.index', ['data' => [$decodedFrom]]);
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

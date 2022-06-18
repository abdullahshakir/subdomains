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
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('footer', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $jsonData = ['address_title' => $request->address_title, 'description' => $request->description, 'file' => $address,
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
    public function edit($id)
    {
        try {
            $previousAttributes = DomainSection::where('name', 'footer')->first('attributes_data');
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            return view('backoffice.footer.update', with(['data' => $decodedFrom[$id]]));
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
    public function update(Request $request, $id)
    {
        try {
            if($request->file()) {
                $name =  time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('footer', $name, 'public');
                $file = '/storage/' . $filePath;
            }
            $domainId = Domain::where('url', $request->domain_name)->first();
            $previousAttributes = DomainSection::where('name', 'footer')->select('attributes_data')->first();
            $decodedFrom = json_decode($previousAttributes['attributes_data'], true);
            $decodedFrom[$id]['address_title'] = $request->address_title;
            $decodedFrom[$id]['description'] = $request->description;
            $decodedFrom[$id]['address'] = $address;
            $decodedFrom[$id]['phone'] = $phone;
            $decodedFrom[$id]['email'] = $email;
            $decodedFrom[$id]['fax'] = $fax;
            $decodedFrom[$id]['total_download'] = $total_download;
            $decodedFrom[$id]['download_text'] = $download_text;
            $decodedFrom[$id]['total_client'] = $total_client;
            $decodedFrom[$id]['client_text'] = $client_text;
            $decodedFrom[$id]['subscribe_description'] = $subscribe_description;
            $decodedFrom[$id]['facebook_link'] = $facebook_link;
            $decodedFrom[$id]['subscriber_link'] = $subscriber_link;
            $decodedFrom[$id]['privacy_link'] = $privacy_link;
            $decodedFrom[$id]['term_link'] = $term_link;
            $decodedFrom[$id]['pinterest_link'] = $pinterest_link;
            $decodedFrom[$id]['yahoo_link'] = $yahoo_link;
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

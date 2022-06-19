@extends('layouts.app')
@section('content')
@php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
@endphp
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Footer</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{url('domains/'.$domainId.'/footers/create')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Address Title</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Download Text</th>
                        <th>Total Downloads</th>
                        <th>Total Clients</th>
                        <th>Client Text</th>
                        <th>Subscribe Description</th>
                        <th>Subscriber Link</th>
                        <th>Facebook Link</th>
                        <th>Yahoo Link</th>
                        <th>Pinterest Link</th>
                        <th>Privacy Link</th>
                        <th>Term & Condition Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                @if ($data != null)
                    @forelse($data as $key => $item)
                        <tr>
                            <td> {{ $item['address_title'] }} </td>
                            <td> {{ $item['address'] }} </td>
                            <td> {{ $item['phone'] }} </td>
                            <td> {{ $item['fax'] }} </td>
                            <td> {{ $item['email'] }} </td>
                            <td> {{ $item['download_text'] }}</td>
                            <td> {{ $item['total_download'] }} </td>
                            <td> {{ $item['total_client'] }} </td>
                            <td> {{ $item['client_text'] }} </td>
                            <td> {{ $item['subscribe_description'] }} </td>
                            <td> {{ $item['facebook_link'] }} </td>
                            <td> {{ $item['facebook_link'] }} </td>
                            <td> {{ $item['yahoo_link'] }} </td>
                            <td> {{ $item['pinterest_link'] }} </td>
                            <td> {{ $item['term_link'] }} </td>
                            <td> {{ $item['privacy_link'] }} </td>
                            <td class="text-center">
                                        {{-- <form id="delete-form-{{$attributes['id']}}"
                                    action="{{URL::to('delete-slider', $attributes['id'])}}"
                                    method="post">
                            <a href="{{ URL::to('delete-slider') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById(
                                        'delete-form-{{$attributes['id']}}').submit();">
                                <i class="icon-line-trash"></i>
                            </a> --}}
                            
                            <a href="{{URL::to('domains/'.$domainId.'/footers/'.$key.'/edit')}}">
                                <i class="icon-line-edit"></i>
                            </a>
                                {{-- @csrf @method('DELETE')
                            </form> --}}
                        </td>
                    
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center"> No record found </td>
                        </tr>
                    @endforelse
                    @endif
                </tbody>
                </table>
            </div>
    </section>
@endsection

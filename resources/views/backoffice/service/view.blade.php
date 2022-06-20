@extends('layouts.app')

@section('content')
@php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
@endphp
    <section id="content">
        {{-- <ul id="myTab2" class="nav nav-pills boot-tabs">
            <li class="nav-item"><a class="nav-link active" href="#home2" data-bs-toggle="tab">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile2" data-bs-toggle="tab">Sub Services</a></li>
        </ul> --}}
        <div id="myTabContent2" class="tab-content">
            <div class="tab-pane fade " id="home2">
                <div class="row">
                    <div class="col-6">
                        <h3>Services</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{url('domains/'.$domainId.'/services/create')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Subtitle</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center"> No record found </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show active" id="profile2">
                <div class="row">
                    <div class="col-6">
                        {{-- sub --}}
                        <h3>Services</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{url('domains/'.$domainId.'/services/create')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $key => $item)
                            <tr>
                                <td> {{ $item['title'] }} </td>
                                <td> {{ $item['description'] }} </td>
                                <td>
                                    <img src="{{ $item['file'] }}"
                                         alt="{{ $item['file'] }}"
                                         width="100"
                                    >
                                </td>
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
                                    <a href="{{URL::to('domains/'.$domainId.'/services/'.$key.'/edit')}}">
                                        <i class="icon-line-edit"></i>
                                    </a>
                                        {{-- @csrf @method('DELETE')
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center"> No record found </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </section>
    <script src="{{URL::asset('assets/js/functions.js')}}"></script>
@endsection

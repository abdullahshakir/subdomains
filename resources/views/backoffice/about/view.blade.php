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
                <h3>About us</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{url('domains/'.$domainId.'/abouts/create')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>           
        <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Color</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($data != null)
                        @forelse($data as $key => $item)
                        <tr>
                            <td> {{ $item['title'] }} </td>
                            <td> {{ $item['description'] }} </td>
                            <td> {{ $item['color'] }} </td>
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
                                <a href="{{URL::to('domains/'.$domainId.'/about/'.$key.'/edit')}}">
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
                @endif
                    </tbody>
                </table>
            </div>
    </section>
@endsection

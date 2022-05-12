@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>About us</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('index.about')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
                        <th>Section</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td> {{ $item->title }} </td>
                            <td> {{ $item->sub_title }} </td>
                            <td>
                                <img src="{{ $item->file }}"
                                     alt="{{ $item->file }}"
                                     width="100"
                                >
                            </td>
                            <td> {{ $item->section }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td class="text-center">
                                <a href="{{ URL::to('delete-about') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$item->id}}').submit();">
                                    <i class="icon-line-trash"></i>
                                </a>
                            </td>
                            <form id="delete-form-{{$item->id}}"
                                  action="{{URL::to('delete-about', $item->id)}}"
                                  method="post">
                                @csrf @method('DELETE')
                            </form>
                            &nbsp;
                                <a href="{{URL::to('edit-about/'.$item->id)}}">
                                    <i class="icon-line-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"> No record found </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </section>
@endsection

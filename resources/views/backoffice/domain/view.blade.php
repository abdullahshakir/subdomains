@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Domain</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('index.domain')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Theme</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $key => $item)
                        <tr>
                            <td> {{ $item->theme->name }} </td>
                            <td> {{ $item->title }} </td> 
                            <td> {{ $item->url }} </td> 
                            <td> {{ $item->created_at }} </td> 
                            <td class="text-center d-flex">
                                <form id="delete-form-{{$item->id}}"
                                      action="{{URL::to('delete-domain', $item->id)}}"
                                      method="post">
                                <a href="{{ URL::to('delete-domain') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$item->id}}').submit();">
                                <i class="icon-line-trash"></i>
                                </a>
                                <a href="{{URL::to('edit-domain/'.$item->id)}}" class="adjust-left-margin">
                                    <i class="icon-line-edit"></i>
                                </a>
                                    @csrf @method('DELETE')
                                </form>
                                <a href="{{URL::to('sub-domain')}}" class="adjust-left-margin">
                                    <i class="icon-line2-settings"></i>
                                </a>
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
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Footer</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('index.footer')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
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
                        <th>Total Downloads</th>
                        <th>Total Clients</th>
                        <th>Client Text</th>
                        <th>Subscribe Description</th>
                        <th>Facebook Link</th>
                        <th>Subscriber Link</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td> {{ $item->address_title }} </td>
                            <td> {{ $item->address }} </td>
                            <td> {{ $item->phone }} </td>
                            <td> {{ $item->fax }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->total_download }} </td>
                            <td> {{ $item->total_client }} </td>
                            <td> {{ $item->client_text }} </td>
                            <td> {{ $item->subscribe_description }} </td>
                            <td> {{ $item->facebook_link }} </td>
                            <td> {{ $item->subscriber_link }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td class="text-center">
                                <form id="delete-form-{{$item->id}}"
                                      action="{{URL::to('delete-footer', $item->id)}}"
                                      method="post">
                                    <a href="{{ URL::to('delete-footer') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$item->id}}').submit();">
                                        <i class="icon-line-trash"></i>
                                    </a>
                                    <a href="{{URL::to('edit-footer/'.$item->id)}}">
                                        <i class="icon-line-edit"></i>
                                    </a>
                                    @csrf @method('DELETE')
                                </form>
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

@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Slider</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('index.slider')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
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
                            <td> {{ $item->created_at }} </td>
                            <td class="text-center">
                                <form id="delete-form-{{$item->id}}"
                                      action="{{URL::to('delete-slider', $item->id)}}"
                                      method="post">
                                <a href="{{ URL::to('delete-slider') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-{{$item->id}}').submit();">
                                    <i class="icon-line-trash"></i>
                                </a>
                                <a href="{{URL::to('edit-slider/'.$item->id)}}">
                                    <i class="icon-line-edit"></i>
                                </a>
                                    @csrf @method('DELETE')
                                </form>
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
@extends('layouts.app')

@section('content')
    <section id="content">
        <ul id="myTab2" class="nav nav-pills boot-tabs">
            <li class="nav-item"><a class="nav-link active" href="#home2" data-bs-toggle="tab">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile2" data-bs-toggle="tab">Sub Services</a></li>
        </ul>
        <div id="myTabContent2" class="tab-content">
            <div class="tab-pane fade show active" id="home2">
                <div class="row">
                    <div class="col-6">
                        <h3>Services</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{route('services.index')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Subtitle</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td> {{ $item->title }} </td>
                                <td>
                                    <img src="{{ $item->file }}"
                                         alt="{{ $item->file }}"
                                         width="100"
                                    >
                                </td>
                                <td> {{ $item->sub_title }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td class="text-center">
                                    <form id="delete-form-{{$item->id}}"
                                          action="{{URL::to('delete-service', $item->id)}}"
                                          method="post">
                                        <a href="{{ URL::to('delete-service') }}"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-{{$item->id}}').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="{{URL::to('edit-service/'.$item->id)}}">
                                            <i class="icon-line-edit"></i>
                                        </a>
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
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
            <div class="tab-pane fade" id="profile2">
                <div class="row">
                    <div class="col-6">
                        <h3>Sub Services</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{route('services.index')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($subService as $item)
                            <tr>
                                <td> {{ $item->title }} </td>
                                <td>
                                    <img src="{{ $item->icon }}"
                                         alt="{{ $item->icon }}"
                                         width="100"
                                    >
                                </td>
                                <td> {{ $item->description }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td class="text-center">
                                    <form id="delete-form-{{$item->id}}"
                                          action="{{URL::to('delete-service', $item->id)}}"
                                          method="post">
                                        <a href="{{ URL::to('delete-service') }}"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-{{$item->id}}').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="{{URL::to('edit-sub-services/'.$item->id)}}">
                                            <i class="icon-line-edit"></i>
                                        </a>
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
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

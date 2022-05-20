@extends('layouts.app')

@section('content')
    <section id="content">
        <ul id="myTab2" class="nav nav-pills boot-tabs">
            <li class="nav-item"><a class="nav-link active" href="#home2" data-bs-toggle="tab">Team</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile2" data-bs-toggle="tab">Team Members</a></li>
        </ul>
        <div id="myTabContent2" class="tab-content">
            <div class="tab-pane fade show active" id="home2">
                <div class="row">
                    <div class="col-6">
                        <h3>Team</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{route('index.team')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->sub_title }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td class="text-center">
                                    <form id="delete-form-{{$item->id}}"
                                          action="{{URL::to('delete-team', $item->id)}}"
                                          method="post">
                                        <a href="{{ URL::to('delete-team') }}"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-{{$item->id}}').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="{{URL::to('edit-team/'.$item->id)}}">
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
                        <h3>Team Members</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{route('index.team.members')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>TeamTitle</th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Facebook</th>
                            <th>Google</th>
                            <th>Twitter</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($teamMembers as $item)
                            <tr>
                                <td> {{ $item->team->title }} </td>
                                <td> {{ $item->name }} </td>
                                <td>
                                    <img src="{{ $item->file }}"
                                         alt="{{ $item->file }}"
                                         width="100"
                                    >
                                </td>
                                <td> {{ $item->designation }} </td>
                                <td> {{ $item->description }} </td>
                                <td> {{ $item->facebook_link }} </td>
                                <td> {{ $item->google_link }} </td>
                                <td> {{ $item->twitter_link }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td class="text-center">
                                    <form id="delete-form-{{$item->id}}"
                                          action="{{URL::to('delete-team', $item->id)}}"
                                          method="post">
                                        <a href="{{ URL::to('delete-team') }}"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-{{$item->id}}').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="{{URL::to('edit-team-members/'.$item->id)}}">
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

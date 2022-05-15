@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.team')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="{{URL::to('update-team-members/'.request()->route()->parameters['id'])}}"
                        @csrf
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
{{--                        <div class="col-12 form-group">--}}
{{--                            <label>Team:</label>--}}
{{--                            <select class="form-select required" name="team_id">--}}
{{--                                <option value="">-- Select One --</option>--}}
{{--                                @forelse($data as $item)--}}
{{--                                    <option value="{{$item->id}}">{{$item->title}}</option>--}}
{{--                                @empty--}}
{{--                                    <option>No theme registered yet</option>--}}
{{--                                @endforelse--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="col-6 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" id="" class="form-control required" value="{{$data->name}}" placeholder="Enter name">
                        </div>
                        <div class="col-6 form-group">
                            <label>Upload:</label>
                            <input type="file" id="jobs-application-resume" name="file"
                                   class="file-loading form-select required" data-show-preview="false"/>
                        </div>
                        <div class="col-6 form-group">
                            <label>Designation:</label>
                            <input type="text" name="designation" id="" class="form-control required"
                                   value="{{$data->designation}}" placeholder="Enter designation">
                        </div>
                        <div class="col-6 form-group">
                            <label>Facebook Link:</label>
                            <input type="text" name="facebook_link" id="" class="form-control required"
                                   value="{{$data->facebook_link}}" placeholder="Enter facebook link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Google Link: </label>
                            <input type="text" name="google_link" id="" class="form-control required"
                                   value="{{$data->google_link}}" placeholder="Enter google link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Twitter Link:</label>
                            <input type="text" name="twitter_link" id="" class="form-control required"
                                   value="{{$data->twitter_link}}" placeholder="Enter twitter link">
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description"
                                          placeholder="Enter description" class="form-control
                                          required" cols="5" rows="5">
                                    {{$data->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
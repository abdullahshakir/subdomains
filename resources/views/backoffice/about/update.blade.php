@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.about')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="{{URL::to('update-about/'.request()->route()->parameters['id'])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Title:</label>
                            <input type="text" name="title" id="title" class="form-control required"
                                   value="{{$data->title}}" placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>SubTitle:</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control required"
                                   value="{{$data->sub_title}}" placeholder="Enter subtitle">
                        </div>
                        <div class="form-group">
                            <label>Upload CV:</label>
                            <input type="file" id="jobs-application-resume" name="file" class="file-loading form-select required" data-show-preview="false" />
                        </div>
                        <div class="col-12 form-group">
                            <label>Section:</label>
                            <input type="text" name="section" id="section" class="form-control required"
                                   value="{{$data->section}}" placeholder="Enter section">
                        </div>
                        <div class="col-12 form-group">
                            <label>Description:</label>
                            <textarea name="description" id="description" class="form-control required"
                                   value="{{$data->description}}" cols="30" rows="5">
                            </textarea>
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

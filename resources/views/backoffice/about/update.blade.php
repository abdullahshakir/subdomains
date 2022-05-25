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
                            <label>Color:</label>
                            <input type="text" name="color" class="form-control required"
                                   value="{{$data->color}}" placeholder="Enter color">
                        </div>
                        <div class="col-12 form-group">
                            <label>Description:</label>
                            <textarea name="description" id="description" placeholder="Enter description"
                                      class="form-control required" cols="30" rows="5">
                                {{$data->description}}
                            </textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

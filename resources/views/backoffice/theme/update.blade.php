@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.theme')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="{{URL::to('update-theme/'.request()->route()->parameters['id'])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" class="form-control required"
                                   value="{{$data->name}}" placeholder="Enter name">
                        </div>
                        <div class="col-12 form-group">
                            <label>Upload:</label>
                            <input type="file" id="jobs-application-resume" name="file"
                                   class="file-loading form-select required"
                                   data-show-preview="false"
                            />
                        </div>
                        <div class="col-12 form-group">
                            <label>Description:</label>
                            <textarea name="description"
                                      placeholder="Enter description" class="form-control
                                      required" cols="30" rows="10">
                                {{$data->description}}
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

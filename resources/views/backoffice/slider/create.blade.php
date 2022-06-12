@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Slider</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('sliders.index')}}"
                   class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-process">
                        <div class="css3-spinner">
                            <div class="css3-spinner-scaler"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label>Tile:</label>
                            <input type="text" name="title" id="title" class="form-control required" 
                                    value="{{ old('title') }}" placeholder="Enter title">
                        </div>
                        <div class="col-6 form-group">
                            <label>Sub title:</label>
                            <input type="text" name="sub_title" id="" class="form-control required" value=""
                                   placeholder="Enter sub title">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <label>Upload CV:</label>
                                <input type="file" id="jobs-application-resume" name="file"
                                       class="file-loading form-select required" data-show-preview="false"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

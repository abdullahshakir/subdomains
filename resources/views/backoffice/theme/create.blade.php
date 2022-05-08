@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Theme</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.theme')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
                <div class="form-result"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" action="{{route('create.theme')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Name:</label>
                                <input type="text" name="name" id="name" class="form-control required" value="" placeholder="Enter name">
                            </div>
                            <div class="col-12 form-group">
                                <label>Mode:</label>
                                <input type="text" name="mode" id="mode" class="form-control required" value="" placeholder="Enter mode">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary">create</button>
                            </div>
                            <input type="hidden" name="prefix" value="jobs-application-">
                        </form>
                    </div>
                </div>
            </div>
</section>
@endsection

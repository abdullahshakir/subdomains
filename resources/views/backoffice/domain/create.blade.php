@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>About</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.domain')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
                <div class="form-result"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" action="{{route('create.domain')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Domain:</label>
                                <input type="text" name="name" id="name" class="form-control required"
                                       placeholder="Enter domain name">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary">create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</section>
@endsection

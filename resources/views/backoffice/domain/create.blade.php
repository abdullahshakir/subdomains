@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Domain</h3>
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
                                <label>Theme:</label>
                                <select class="form-select required" name="theme_id">
                                    <option value="">-- Select One --</option>
                                    @forelse($data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty
                                        <option>No theme registered yet</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control required"
                                       placeholder="Enter domain title">
                            </div>
                            <div class="col-12 form-group">
                                <label>URL:</label>
                                <input type="text" name="url" class="form-control required"
                                       placeholder="Enter domain url">
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

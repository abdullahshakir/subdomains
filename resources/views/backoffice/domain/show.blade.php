@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Domain</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('domains.index')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="table-responsive">
           <h4>Domain Title: <span style="margin-left:20px">{{$data->title}}</span></h4>
           <h4>Domain URL: <span style="margin-left:24px">{{$data->url}}</span></h4>
           <h4>Ceation Date: <span style="margin-left:20px">{{$data->created_at}}</span></h4>
        </div>
    </section>
@endsection

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
        </div>
    </section>
@endsection

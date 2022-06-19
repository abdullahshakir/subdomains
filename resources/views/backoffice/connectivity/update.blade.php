@extends('layouts.app')
@section('content')
@php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
@endphp
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('connectivities.index')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $id = request()->route()->parameters()   
                    @endphp
                    <form class="row" action="{{url('connectivities/'. $id['connectivity'])}}"
                          method="post" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                        <input type="hidden" value="{{request()->getHost()}}" name="domain_name"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Title:</label>
                            <input type="text" name="title" id="title" class="form-control required"
                                   value="{{$data['title']}}" placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description" placeholder="Enter description" rows="3">{{$data['description']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload:</label>
                            <input type="file" id="jobs-application-resume" name="file" class="file-loading form-select required" data-show-preview="false" />
                                <img src="{{$data['file']}}" alt="{{$data['file']}}"
                                    class="mt-2" width="100" />
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

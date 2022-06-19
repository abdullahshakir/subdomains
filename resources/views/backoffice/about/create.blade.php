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
                <h3>About</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{url('domains/'.$domainId.'/about')}}"
                   class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="{{url('domains/'.$domainId.'/about')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{request()->getHost()}}" name="domain_name"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Tile:</label>
                            <input type="text" name="title" id="title" class="form-control required" value=""
                                   placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>Color:</label>
                            <input type="text" name="color" class="form-control required" value=""
                                   placeholder="Enter color">
                        </div>
                        <div class="col-12 form-group">
                            <div class="row">
                                <div class="w-100"></div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea id="" name="description"
                                              placeholder="Enter description" class="form-control
                                              required" cols="30" rows="7">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary">create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

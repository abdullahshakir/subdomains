@extends('layouts.app')
@section('content')
@php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
@endphp
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{url('domains/'.$domainId.'/footers')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="{{url('domains/'.$domainId.'/footers/'.$id['footer'])}}"
                          method="post" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                        <input type="hidden" value="{{request()->getHost()}}" name="domain_name"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label>Address Title:</label>
                            <input type="text" name="address_title" class="form-control required"
                                   value="{{$data['address_title']}}" placeholder="Enter address title">
                        </div>
                        <div class="col-6 form-group">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control required"
                                   value="{{$data['address']}}" placeholder="Enter address">
                        </div>
                        <div class="col-6 form-group">
                            <label>Phone:</label>
                            <input type="text" name="phone" class="form-control required"
                                   value="{{$data['phone']}}" placeholder="Enter phone">
                        </div>
                        <div class="col-6 form-group">
                            <label>Fax:</label>
                            <input type="text" name="fax" class="form-control required"
                                   value="{{$data['fax']}}" placeholder="Enter fax">
                        </div>
                        <div class="col-6 form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control required"
                                   value="{{$data['email']}}" placeholder="Enter email">
                        </div>
                        <div class="col-6 form-group">
                            <label>Client Text:</label>
                            <input type="text" name="client_text" class="form-control required"
                                   value="{{$data['client_text']}}" placeholder="Enter client text">
                        </div>
                        <div class="col-6 form-group">
                            <label>Facebook Link:</label>
                            <input type="text" name="facebook_link" class="form-control required"
                                   value="{{$data['facebook_link']}}" placeholder="Enter facebook link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Subscriber Link:</label>
                            <input type="text" name="subscriber_link" class="form-control required"
                                   value="{{$data['subscriber_link']}}" placeholder="Enter mode">
                        </div>
                        <div class="col-6 form-group">
                            <label>Yahoo Link:</label>
                            <input type="text" name="yahoo_link" class="form-control required" value="{{$data['yahoo_link']}}" placeholder="Enter yahoo link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Pinterest Link:</label>
                            <input type="text" name="pinterest_link" class="form-control required" value="{{$data['pinterest_link']}}" placeholder="Enter pinterest link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Privacy Link:</label>
                            <input type="text" name="privacy_link" class="form-control required" value="{{$data['privacy_link']}}" placeholder="Enter privacy link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Terms & Conditions Link:</label>
                            <input type="text" name="term_link" class="form-control required" value="{{$data['term_link']}}" placeholder="Enter terms & conditions link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Subscribe Description:</label>
                            <textarea name="subscribe_description" placeholder="Enter subscribe description"
                                      class="form-control required" cols="30" rows="10">
                                {{$data['subscribe_description']}}
                            </textarea>
                        </div>
                        <div class="col-6 form-group">
                            <label>Description:</label>
                            <textarea name="description" placeholder="Enter description"
                                      class="form-control required" cols="30" rows="10">
                                {{$data['description']}}
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

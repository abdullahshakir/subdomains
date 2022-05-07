@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Service</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.service')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
                <div class="form-result"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" action="{{route('create.service')}}" method="post" enctype="multipart/form-data">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Tile:</label>
                                <input type="text" name="title" id="title" class="form-control required" value="" placeholder="Enter title">
                            </div>
                            <div class="col-12 form-group">
                                <label>Sub title:</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control required" value="" placeholder="Enter sub title">
                            </div>
                            <div class="col-12 form-group">
                                <div class="row">
                                    <div class="w-100"></div>
                                    <div class="col-md-6 form-group">
                                        <label>Theme:</label>
                                        <select class="form-select required" name="theme" id="theme">
                                            <option value="">-- Select One --</option>
                                            <option value="Part-Time">Part-Time</option>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Freelance">Freelance</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>section:</label>
                                        <input type="text" name="section" id="section" class="form-control" value="" placeholder="Enter section">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload CV:</label>
                                    <input type="file" id="jobs-application-resume" name="jobs-application-resume" class="file-loading form-select required" data-show-preview="false" />
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea id="jobs-application-message" placeholder="Enter description" class="form-control required" cols="30" rows="10"></textarea>
                                </div>
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

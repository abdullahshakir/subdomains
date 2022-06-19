@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Sub Services</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{url('domains/'.$domainId.'/service')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
                <div class="form-result"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" action="{{url('domains/'.$domainId.'/service')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Service Id:</label>
                                <select class="form-select required" name="service_id">
                                    <option value="">-- Select One --</option>
                                    @forelse($data as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @empty
                                        <option>No service registered yet</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control required" value="" placeholder="Enter name">
                            </div>
                            <div class="col-6 form-group">
                                <label>Upload:</label>
                                <input type="file" id="jobs-application-resume" name="icon"
                                       class="file-loading form-select required" data-show-preview="false"/>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description"
                                              placeholder="Enter description" class="form-control
                                              required" cols="5" rows="5">
                                    </textarea>
                                </div>
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

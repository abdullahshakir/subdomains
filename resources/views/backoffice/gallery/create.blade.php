@extends('layouts.app')
@section('content')
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Gallery</h3>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('view.gallery')}}" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
                <div class="form-result"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" action="{{route('create.gallery')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <div class="row">
                                    <div class="w-100"></div>
                                    <div class="col-md-12 form-group">
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
                                </div>
                                <div class="form-group">
                                    <label>Upload:</label>
                                    <input type="file" id="jobs-application-resume" name="file" class="file-loading form-select required" data-show-preview="false" />
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="is_center" value="1"/>
                                <button type="submit" class="btn btn-secondary">create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</section>
@endsection

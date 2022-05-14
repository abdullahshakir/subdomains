@extends('layouts.default')
@section('content')
    <div class="pt-6">
        @include('pages.services')
        @include('pages.gallery')
        @include('pages.portfolio')
        @include('pages.about-us')
{{--        @include('pages.contact-us')--}}
    </div>
@stop

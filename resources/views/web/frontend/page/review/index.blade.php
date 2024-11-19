@extends('web.frontend.template.layout')

@section('review-style')
    <link rel="stylesheet" href="{{asset('css/main/review.css')}}">
@endsection

@section('content')
    <div class="container">
        {{-- Feedback form --}}
        @include('web.frontend.page.review.section.form')
        {{-- Review --}}
        @include('web.frontend.page.review.section.review')
    </div>
@endsection
@extends('web.frontend.template.layout')

@section('content')

@include('web.frontend.page.home.section.header')

@if(Session::has('fail'))
        <div class="alert alert-danger">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong>Try again!</strong> {!! session('fail') !!}
@endif
        </div>
@include('web.frontend.page.home.section.ticket')

@include('web.frontend.page.home.section.popular') 

@include('web.frontend.page.home.section.promo')

@include('web.frontend.page.home.section.info')

@include('web.frontend.page.home.section.subscribe')
        
@endsection
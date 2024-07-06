@extends('web.frontend.template.layout')

@section('content')

@include('web.frontend.page.home.section.header')

@include('web.frontend.page.home.section.ticket')

@include('web.frontend.page.home.section.popular') 

@include('web.frontend.page.home.section.promo')

@include('web.frontend.page.home.section.info')

@include('web.frontend.page.home.section.subscribe')
        
@endsection
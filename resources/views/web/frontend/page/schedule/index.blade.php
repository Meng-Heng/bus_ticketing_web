@extends('web.frontend.template.layout')

@section('schedule-style')
    <link href="{{asset('css/main/schedule.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main/seat.css')}}" rel="stylesheet" />
    <meta name="_token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    @include('web.frontend.page.schedule.section.available_time')
@endsection

@section('schedule-script')
    <script type="text/javascript" src="{{asset ('js/seat.js')}}"></script>
        <!-- Modal -->
    <script type="text/javascript" src="{{asset ('js/jquery-3.5.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/bootstrap-4.5.2.min.js')}}"></script>
@endsection

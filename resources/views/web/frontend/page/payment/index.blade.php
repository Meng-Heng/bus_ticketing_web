@extends('web.frontend.template.layout')

@section('ticket-confirmation-style')
    <!-- Ticket Confirmation Styles -->    
    <link href="{{asset('css/main/ticket.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">  
        @include('web.frontend.page.payment.section.ticket')

        @include('web.frontend.page.payment.section.payment')
    </div>

    @include('web.frontend.page.station.index')

    <script>
        $(document).ready(function () {
            $('#openStation').on('click', () => {
                $('#stationModal').modal('show')
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#openBusStation').on('click', () => {
                $('#stationModal').modal('show')
            })
        })
    </script>
@endsection
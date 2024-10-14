@extends('web.frontend.template.layout')

@section('ticket-confirmation-style')
    <!-- Ticket Confirmation Styles -->    
    <link href="{{asset('css/main/ticket.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">  
        @include('web.frontend.page.payment.section.ticket')

        @include('web.frontend.page.payment.section.payment')

        <div>
            <button class="btn btn-danger" id="paymentBtn">Pay now</button>
        </div>
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

    @vite(['resources/js/khqr/generateQR.js', 'resources/js/khqr/showQR.js'])
    
    <!-- Include Bakong KhQR -->
    <script src="https://github.com/davidhuotkeo/bakong-khqr/releases/download/bakong-khqr-1.0.6/khqr-1.0.6.min.js"></script>
@endsection
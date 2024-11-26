@extends('web.frontend.template.layout')

@section('ticket-confirmation-style') 
    <link href="{{asset('css/main/ticket.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
@endsection

@section('content')
    <div class="container">  
        @include('web.frontend.page.payment.ticket')

        @include('web.frontend.page.payment.checkout')
        
    </div>
    {{-- Checkout Scripts --}}
    <script src="https://checkout.payway.com.kh/plugins/checkout2-0.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkout_button').on('click', async (e) => {
                    AbaPayway.checkout();
            });
        });
    </script>
    {{-- End Checkout Scripts --}}

    {{-- Station Modal --}}
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
    {{-- End Station Modal --}}

@endsection
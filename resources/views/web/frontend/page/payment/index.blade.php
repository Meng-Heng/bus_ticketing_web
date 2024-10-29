@extends('web.frontend.template.layout')

@section('ticket-confirmation-style') 
    <link href="{{asset('css/main/ticket.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">  
        @include('web.frontend.page.payment.section.ticket')

        @include('web.frontend.page.payment.section.checkout')

        @include('web.frontend.page.payment.section.payment')
    </div>
    
    {{-- PayWay Scripts --}}
    <script src="https://checkout.payway.com.kh/plugins/checkout2-0.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkout_button').on('click', async (e) => {
                try {
                    AbaPayway.checkout();
                } 
                catch(error) {
                    console.error('MengHeng\'s Error: ', error)
                }
            });
        });
        $(document).ready(function () {
            $('#woori_checkout').on('click', ()=> {
                let khqr_payment = `
                    <div class="row">
                        <img src="{{asset('images/background/payment/woori_usd.JPG')}}" alt="Woori KhQR" ">
                        <img src="{{asset('images/background/payment/woori_khr.JPG')}}" alt="Woori KhQR" ">
                    </div>
                        `
                    $('#wooriModal .modal-body').html(
                        `
                        ${khqr_payment}
                        `
                    )
                    $('#wooriModal').modal('show')
                })
            });
    </script>
    {{-- End PayWay Scripts --}}

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
    
    <!-- Include Bakong KhQR -->
    {{-- @vite(['resources/js/khqr/generateQR.js', 'resources/js/khqr/showQR.js']) --}}
    <script src="https://github.com/davidhuotkeo/bakong-khqr/releases/download/bakong-khqr-1.0.6/khqr-1.0.6.min.js"></script>
    {{-- End Bakong KhQr --}}

@endsection
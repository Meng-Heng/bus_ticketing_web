@extends('web.frontend.template.layout')

@section('ticket-confirmation-style') 
    <link href="{{asset('css/main/ticket.css')}}" rel="stylesheet" />
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
                    <div class="col">
                        <img src="{{asset('images/background/payment/woori_usd.JPG')}}" alt="Woori KhQR" style="width:45%; margin:10px">
                        <img src="{{asset('images/background/payment/woori_khr.JPG')}}" alt="Woori KhQR" style="width:45%; margin:10px">
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
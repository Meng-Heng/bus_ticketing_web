<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="{{asset('css/template/header.css')}}" rel="stylesheet" />
    <link href="{{asset('css/template/template.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main/homepage.css')}}" rel="stylesheet" />

    <!-- MDB templates and home page -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet"/>

    <!-- Ajax & Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    @yield('schedule-style')

    @yield('ticket-confirmation-style')

    <!-- Include Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <title>Bus4U</title>
</head>
<body>
    <!-- Navbar -->
      @include('web.frontend.component.navigation')
    <!-- Navbar -->

    @yield('content')

    <!-- Footer -->
      @include('web.frontend.component.footer')
    <!-- Footer -->

    {{-- Navigation --}}
    <script src="{{ asset('js/all.js')}}" crossorigin="anonymous"></script>

    {{-- Ticket scripts --}}
    <script type="text/javascript" src="{{asset ('js/ticket-form.js')}}"></script>

    @yield('schedule-script')

    {{-- Axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Head scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Include jQuery (Required by Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  </body>
</html>
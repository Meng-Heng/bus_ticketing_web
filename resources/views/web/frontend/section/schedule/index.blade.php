<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/template/header.css')}}" rel="stylesheet" />
    <link href="{{asset('css/template/template.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main/schedule.css')}}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link
    href="{{ asset('css/all.min.css')}}"
    rel="stylesheet"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="{{ asset('css/mdb.min.css') }}"
    rel="stylesheet"
    />
    <title>Bus4U</title>
</head>
<body>
        @include('web.frontend.component.navigation')

        @include('web.frontend.component.schedule_card')

		@include('web.frontend.section.schedule.available_time')

        @include('web.frontend.component.footer')
    <script>
        // Initialization for ES Users
    </script>
    <script src="{{ asset('js/all.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js')}}" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset ('js/ticket-form.js')}}"></script>
</body>
</html>
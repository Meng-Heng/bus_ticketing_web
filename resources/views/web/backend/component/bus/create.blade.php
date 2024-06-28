@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Bus</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/bus/create')}}">Bus</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('bus_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('bus_created') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- It Create the new Category -->

                {!! Form::open(array('url'=>'bus')) !!}
                <br>
                {!! Form::label('bus_plate', 'Bus Plate Number:') !!}
                {!! Form::text('bus_plate',null, array('class'=>'form-control')) !!}

                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('total_seat', 'Total seat:') !!}
                {!! Form::text('total_seat',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('is_active', 'Active:') !!}
                {!! Form::select('is_active', ["false", "true"], array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/bus')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
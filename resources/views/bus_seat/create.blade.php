@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Seat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/bus-seat/create')}}">Seat Type</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
               
                @if (count($errors) > 0)
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

                {!! Form::open(array('url'=>'bus-seat')) !!}
                <br>
                {!! Form::label('bus_id', 'Bus Number Plate') !!}
                {!! Form::select('bus_id',$buses, null, array('class'=>'form-control')) !!}
                
                {!! Form::label('seat_id', 'Seat Number') !!}
                {!! Form::select('seat_id',$seats, null, array('class'=>'form-select')) !!}
                
                {!! Form::label('price_id', 'Price') !!}
                {!! Form::select('price_id',$prices, null, array('class'=>'form-select')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/bus-seat')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
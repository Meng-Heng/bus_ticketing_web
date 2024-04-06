@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Seat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/schedule/create')}}">Seat Type</a></li>
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

                {!! Form::open(array('url'=>'schedule')) !!}
                <br>
                {!! Form::label('bus_seat_id', 'Bus Seat ID') !!}
                {!! Form::select('bus_seat_id',$bus_seats, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('destination', 'Destination') !!}
                {!! Form::text('destination', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('departure_date', 'Departure date') !!}
                {!! Form::text('departure_date', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('departure_time', 'Departure time') !!}
                {!! Form::text('departure_time', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('arrival_date', 'Arrival date') !!}
                {!! Form::text('arrival_date', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('arrival_time', 'Arrival time') !!}
                {!! Form::text('arrival_time', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('is_sold', 'Sold out') !!}
                {!! Form::select('is_sold', ["false (Available)", "true (Sold out)"], null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('station_id', 'Bus Station') !!}
                {!! Form::select('station_id', $stations, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/schedule')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
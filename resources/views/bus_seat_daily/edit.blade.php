@extends('layout.backend')
@section('content')
    @if(Session::has('bus_seat_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('bus_seat_updated') !!}
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
    {{ Form::model($tbl_bus_seat_daily , array('route' => array('schedule.update', $tbl_bus_seat_daily->id), 'method'=>'PUT')) }}
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
                {!! Form::text('is_sold', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('station_id', 'Bus Station') !!}
                {!! Form::select('station_id', $stations, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                {!! Form::close() !!}
@endsection

@extends('web.backend.layout.admin')
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
    {!! Form::label('id', 'ID') !!}
    <input type="text" class="form-control" value="{{$tbl_bus_seat_daily->id}}" readonly>
                <br>
                {!! Form::label('bus_id', 'Bus ID') !!}
                {!! Form::select('bus_id', $bus, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('origin', 'Origin') !!}
                {!! Form::text('origin', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('departure_date', 'Departure date') !!}
                {!! Form::text('departure_date', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('departure_time', 'Departure time') !!}
                {!! Form::text('departure_time', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('destination', 'Destination') !!}
                {!! Form::text('destination', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('arrival_date', 'Arrival date') !!}
                {!! Form::text('arrival_date', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('arrival_time', 'Arrival time') !!}
                {!! Form::text('arrival_time', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('sold_out', 'Sold out') !!}
                <div>
                    <select name="sold_out" id="">
                        <option value="0">Available</option>
                        <option value="1">Sold</option>
                    </select>
                </div>
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{{route('schedule.view')}}">Back</a>
                {!! Form::close() !!}
@endsection

@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('seat_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('seat_updated') !!}
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
    {{ Form::model($tbl_seat , array('route' => array('seat.update', $tbl_seat->id), 'method'=>'PUT')) }}
    {!! Form::label('id', 'Seat ID:') !!}
    <div>
        <input class="form-control" type="text" name="id" value="{{ $tbl_seat->id }}" readonly>
    </div>
    <br>
    {!! Form::label('seat_number', 'Seat Number:') !!}
    {!! Form::text('seat_number', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('seat_type', 'Seat Type:') !!}
    <div>
        <select name="seat_type" id="">
            <option value="Window">Window</option>
            <option value="Aisle">Aisle</option>
        </select>
    </div>
    <br>
    {!! Form::label('bus_id', 'Bus ID:') !!}
    {!! Form::select('bus_id', $bus, null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('storage_id', 'Storage ID:') !!}
    <div>
        <input class="form-control" type="text" name="storage_id" value="{{ $storage->id }}" readonly>
    </div>
    <br>
    {!! Form::label('price_id', 'Price ID:') !!}
    <div>
        <input class="form-control" type="text" name="price_id" value="{{ $price->id }}" readonly>
    </div>
    <br>
    {!! Form::label('status', 'Status:') !!}
    <div>
        <select name="status" id="">
            <option value="Sold">Sold</option>
            <option value="Available">Available</option>
        </select>
    </div>
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}

    <a class="btn btn-primary" href="{!! route('seat.view')!!}">Back</a>

    {!! Form::close() !!}
@endsection

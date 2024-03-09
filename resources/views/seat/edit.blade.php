@extends('layout.backend')
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
    {!! Form::label('name', 'Seat number:') !!}
    {!! Form::text('seat_number',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('seat_type_id', 'Seat Type:') !!}
    {!! Form::select('seat_type_id',$seatTypes, null,array('class'=>'form-select')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection

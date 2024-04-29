@extends('layout.backend')
@section('content')
    @if(Session::has('seat_type_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('seat_type_updated') !!}
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
    {{ Form::model($tbl_seat_type , array('route' => array('seat_type.update', $tbl_seat_type->id), 'method'=>'PUT')) }}
    {!! Form::label('name', 'Seat_type\'s name:') !!}
    {!! Form::text('name',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection

@extends('layout.backend')
@section('content')
    @if(Session::has('bus_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('bus_updated') !!}
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
    {{ Form::model($tbl_bus , array('route' => array('bus.update', $tbl_bus->id), 'method'=>'PUT')) }}
    {!! Form::label('bus_plate', 'Bus plate number:') !!}
    {!! Form::text('bus_plate',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('is_active', 'Active:') !!}
    {!! Form::text('is_active',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection

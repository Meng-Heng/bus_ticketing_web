@extends('web.backend.layout.admin')
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
    {!! Form::label('total_seat', 'Total of seat:') !!}
    <select name="total_seat" class="form-control">
        <option value="37">37</option>
        <option value="6">6</option>
    </select>
    <br>
    {!! Form::label('is_active', 'Active:') !!}
    <select name="is_active" class="form-control">
        <option value="0">Inactive</option>
        <option value="1">Active</option>
    </select>
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('bus.view')!!}">Back</a>
@endsection

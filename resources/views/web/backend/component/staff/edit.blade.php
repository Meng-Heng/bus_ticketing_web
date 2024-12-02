@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('staff_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('staff_updated') !!}
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
    {{ Form::model($tbl_staff , array('route' => array('staff.update', $tbl_staff->id), 'method'=>'PUT')) }}
    @csrf
    {!! Form::label('fname', 'First name:') !!}
    {!! Form::text('fname', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('lname', 'Last name:') !!}
    {!! Form::text('lname', null, array('class'=>'form-control')) !!}
    <br>
    <div>
        <input type="text" value="{{ $tbl_staff->user_id }} {{ $tbl_staff->user->username }}" readonly>
    </div>
    <br>
    {!! Form::label('hometown', 'Hometown:') !!}
    {!! Form::text('hometown', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('identification', 'ID Card/Passport:') !!}
    {!! Form::text('identification', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('residency', 'Residency:') !!}
    {!! Form::text('residency', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('is_active', 'Active:') !!}
    <div>
        <select name="is_active" id="">
            <option value="1">True</option>
            <option value="0">False</option>
        </select>
    </div>
    <br>
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('staff.view')!!}">Back</a>
@endsection

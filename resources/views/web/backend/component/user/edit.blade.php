@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('user_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('user_updated') !!}
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
    {{ Form::model($tbl_user , array('route' => array('user.update', $tbl_user->id), 'method'=>'PUT')) }}
    @csrf
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email',null, array('class'=>'form-control')) !!}
    <br><br>
    {!! Form::label('gender', 'Gender:') !!}
    <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <br><br>
    {!! Form::label('date_of_birth', 'Date of Birth:') !!}
    {!! Form::date('date_of_birth', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('hometown', 'Hometown:') !!}
    {!! Form::text('hometown', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('id_card', 'ID Card/Passport:') !!}
    {!! Form::text('id_card', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('is_active', 'Active:') !!}
    {!! Form::select('is_active', [1,0], null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('user.view')!!}">Back</a>
@endsection

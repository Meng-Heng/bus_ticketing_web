@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('userpermission_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('userpermission_updated') !!}
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
    {{ Form::model($tbl_user_permission , array('route' => array('userpermission.update', $tbl_user_permission->id), 'method'=>'PUT')) }}
    {!! Form::label('permission_id', 'Permission:') !!}
    {!! Form::select('permission_id', $permission, null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $user, null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('userpermission.view')!!}">Back</a>
@endsection

@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Permission to an User</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('userpermission_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('userpermission_created') !!}
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
                <!-- It Create the new Category -->

                {!! Form::open(array('route'=>'userpermission.store')) !!}
                <br>
                {!! Form::label('user_id', 'User:') !!}
                {!! Form::select('user_id', $user, null, array('class'=>'form-control')) !!}

                {!! Form::label('permission_id', 'Permission:') !!}
                {!! Form::select('permission_id', $permission, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('userpermission.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
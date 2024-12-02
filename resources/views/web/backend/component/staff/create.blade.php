@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Staff</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('staff_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('staff_created') !!}
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

                {!! Form::open(array('route'=>'staff.store')) !!}
                <br>
                {!! Form::label('fname', 'First name:') !!}
                {!! Form::text('fname', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('lname', 'Last name:') !!}
                {!! Form::text('lname', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('user_id', 'Created by:') !!}
                {!! Form::select('user_id', $user, null, array('class'=>'form-control')) !!}
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
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('staff.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Bus</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('bus_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('bus_created') !!}
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

                {!! Form::open(array('route'=>'bus.store')) !!}
                <br>
                {!! Form::label('bus_plate', 'Bus Plate Number:') !!}
                {!! Form::text('bus_plate',null, array('class'=>'form-control')) !!}

                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('total_seat', 'Total seat:') !!}
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
                <br><br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('bus.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
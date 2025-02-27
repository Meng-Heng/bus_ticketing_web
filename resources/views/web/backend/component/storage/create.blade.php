@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Storage</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('storage_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('storage_created') !!}
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

                {!! Form::open(array('route'=>'storage.store')) !!}
                <br>
                {!! Form::label('luggage', 'Storage:') !!}
                <input class="form-control" name="luggage" type="text">

                {!! Form::label('measurement', 'Measurement:') !!}
                <input class="form-control" name="measurement" type="text" value="KG" readonly>
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('storage.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
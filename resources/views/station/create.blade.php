@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Bus</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/station/create')}}">Create Station</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('station_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('station_created') !!}
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

                {!! Form::open(array('url'=>'station')) !!}
                <br>
                {!! Form::label('name', 'Station name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}

                {!! Form::label('p_address', 'Priamry Address:') !!}
                {!! Form::text('p_address',null, array('class'=>'form-control')) !!}

                {!! Form::label('s_address', 'Secondary Address (optional):') !!}
                {!! Form::text('s_address',null, array('class'=>'form-control')) !!}

                {!! Form::label('commune', 'Commune:') !!}
                {!! Form::text('commune',null, array('class'=>'form-control')) !!}

                {!! Form::label('district', 'District:') !!}
                {!! Form::text('district',null, array('class'=>'form-control')) !!}

                {!! Form::label('city', 'City:') !!}
                {!! Form::text('city',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/station')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
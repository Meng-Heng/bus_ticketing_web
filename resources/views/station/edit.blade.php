@extends('layout.backend')
@section('content')
    @if(Session::has('station_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('station_updated') !!}
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
    {{ Form::model($tbl_station, array('route' => array('station.update', $tbl_station->id), 'method'=>'PUT')) }}
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
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection

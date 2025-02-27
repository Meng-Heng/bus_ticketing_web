@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('storage_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('storage_updated') !!}
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
    {{ Form::model($tbl_storage, array('route' => array('storage.update', $tbl_storage->id), 'method'=>'PUT')) }}
    {!! Form::label('luggage', 'Storage:') !!}
    {!! Form::text('luggage',null, array('class'=>'form-control')) !!}

    {!! Form::label('measurement', 'Measurement:') !!}
    <input class="form-control" name="measurement" type="text" value="KG" readonly>
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
@endsection

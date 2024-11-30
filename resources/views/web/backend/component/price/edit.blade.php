@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('price_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('price_updated') !!}
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
    {{ Form::model($tbl_price , array('route' => array('price.update', $tbl_price->id), 'method'=>'PUT')) }}
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('currency', 'Currency:') !!}
    <input class="form-control" name="currency" type="text" value="USD" readonly>
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('price.view')!!}">Back</a>
@endsection

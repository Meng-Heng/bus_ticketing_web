@extends('layout.backend')
@section('content')
   
    @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Something is Wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ Form::model($tbl_bus_seat , array('route' => array('bus_seat.update', $tbl_bus_seat->id), 'method'=>'PUT')) }}
    <br>
    {{ Form::label('bus_id', 'Bus plate number:') }}
    {{ Form::select('bus_id', $buses,null, array('class'=>'form-select')) }}
    
    {{ Form::label('seat_id', 'Seat Number:') }}
    {{ Form::select('seat_id',$seats, null ,array('class'=>'form-select')) }}
    
    {{ Form::label('price_id', 'Price:') }}
    {{ Form::select('price_id',$prices, null ,array('class'=>'form-select')) }}
    <br>
    {{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
    {{ Form::close() }}
@endsection

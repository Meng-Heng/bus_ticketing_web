@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Seats</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('seat_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('seat_created') !!}
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

                {!! Form::open(array('route'=>'seat.store')) !!}
                <br>
                {!! Form::label('seat_number', 'Seat Number:') !!}
                {!! Form::text('seat_number', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('seat_type', 'Seat Type:') !!}
                <div>
                    <select name="seat_type" id="">
                        <option value="Window">Window</option>
                        <option value="Aisle">Aisle</option>
                    </select>
                </div>
                <br>
                {!! Form::label('bus_id', 'Bus ID:') !!}
                {!! Form::select('bus_id', $bus, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('storage_id', 'Storage ID:') !!}
                <div>
                    <input class="form-control" type="text" name="storage_id" value="{{ $storage }} KG" readonly>
                </div>
                <br>
                {!! Form::label('price_id', 'Price ID:') !!}
                <div>
                    <input class="form-control" type="text" name="price_id" value="USD {{ $price }}" readonly>
                </div>
                <br>
                {!! Form::label('status', 'Status:') !!}
                <div>
                    <input class="form-control" type="text" name="status" value="Available" readonly>
                </div>
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('seat.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
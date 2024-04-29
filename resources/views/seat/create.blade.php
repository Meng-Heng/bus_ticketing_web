@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Seat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/seat/create')}}">Seat Type</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('seat_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('seat_created') !!}
                </div>
                @endif
                @if (count($errors) > 0)
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

                {!! Form::open(array('url'=>'seat')) !!}
                <br>
                {!! Form::label('seat_number', 'Seat&nbsp;Number:') !!}
                {!! Form::text('seat_number',null, array('class'=>'form-control')) !!}

                {!! Form::label('seat_type_id', 'Seat&nbsp;Type:') !!}
                {!! Form::select('seat_type_id',$seatTypes, null, array('class'=>'form-select')) !!}
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/seat')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Seat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/ticket/create')}}">Ticket</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
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

                {!! Form::open(array('url'=>'ticket')) !!}
                <br>
                {!! Form::label('ticket_id', 'Ticket ID') !!}
                {!! Form::text('ticket_id', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('is_issued', 'Issued date') !!}
                {!! Form::text('is_issued', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('bus_seat_id', 'Bus Seat ID') !!}
                {!! Form::select('bus_seat_id',$bus_seats, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('schedule', 'Schedule') !!}
                {!! Form::select('schedule', $schedules, null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('carry_on', 'Carry on') !!}
                {!! Form::text('carry_on', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('luggage', 'Luggage') !!}
                {!! Form::text('luggage', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('user_id', 'User ID') !!}
                {!! Form::select('user_id', $users ,null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('is_paid', 'Payment status') !!}
                {!! Form::text('is_paid', null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::label('paid_by', 'Payment method') !!}
                {!! Form::select('paid_by', $payments ,null, array('class'=>'form-control')) !!}
                <br>
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! url('/ticket')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection
@extends('layout.backend')
@section('content')
    
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
    {{ Form::model($tbl_ticket , array('route' => array('ticket.update', $tbl_ticket->id), 'method'=>'PUT')) }}
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
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                {!! Form::close() !!}
@endsection

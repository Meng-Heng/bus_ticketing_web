@extends('web.backend.layout.admin')
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
    <input class="form-control" type="text" value="{{$tbl_ticket->ticket_id}}" readonly>
                <br>
    {!! Form::label('is_issued', 'Issued date') !!}
    <input class="form-control" type="text" value="{{$tbl_ticket->is_issued}}" readonly>
    <br>
    {!! Form::label('schedule', 'Schedule') !!}
    <select id="departure_time" name="departure_time_id" class="form-control" required>
        @foreach($departureTimes as $scheduleId => $departureTime)
            <option value="{{ $scheduleId }}" {{ $ticket->schedule_id == $scheduleId ? 'selected' : '' }}>
                {{ $departureTime }}
            </option>
        @endforeach
    </select>
    <br>
    {!! Form::label('selected_seat', 'Your selected seat') !!}
    <input class="form-control" name="prev_selected_seat" type="text" value="{{$tbl_ticket->bus_seat->seat_number}}" readonly>
    <br>
    {!! Form::label('bus_seat_id', 'Change seat') !!}
    <select id="seat_id" name="bus_seat_id" class="form-control" required>
        @foreach ($busSeats as $seat)
            <option value="{{ $seat->id }}" {{ $seat->id == $ticket->bus_seat_id ? 'selected' : '' }}>
                Seat Number: {{ $seat->seat_number }}
            </option>
        @endforeach
    </select>
    <br>
    {!! Form::label('storage', 'Storage') !!}
    <input class="form-control" type="text" value="{{$tbl_ticket->storage->luggage}} {{$tbl_ticket->storage->measurement}}" readonly>
    <br>
    {!! Form::label('price', 'Price') !!}
    <input class="form-control" type="text" value="{{$tbl_ticket->price->currency}} {{$tbl_ticket->price->price}}" readonly>
    <br>
    {!! Form::label('user', 'User') !!}
    <input class="form-control" type="text" value="{{$tbl_ticket->payment->user->username}}" readonly>
    <br>
    {!! Form::label('payment', 'Payment') !!}
    <input class="form-control" type="text" value="{{$tbl_ticket->payment_id}} {{$tbl_ticket->payment->payment_method}}" readonly>
    <br>
    <a class="btn btn-secondary" href="{{ route('ticket.list')}}">Back</a>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    
<script>
    document.getElementById('departure_time').addEventListener('change', function() {
        const scheduleId = this.value;
        const seatSelect = document.getElementById('seat_id');

        // If the schedule is the same, just use the existing seat_id
        fetch(`/dashboard/get-seats/${scheduleId}`)
            .then(response => response.json())
            .then(data => {
                seatSelect.innerHTML = ''; // Clear previous options
    
                data.seats.forEach(seat => {
                    const option = document.createElement('option');
                    option.value = seat.id;
                    option.text = "Seat Number: " + seat.seat_number;
                    seatSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching seats:', error));
    });
    </script>
@endsection

@extends('web.backend.layout.admin')

@section('content')
@if(Session::has('ticket_updated'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Updated!</strong> {!! session('ticket_updated') !!}
</div>
@endif
@if(Session::has('ticket_created'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('ticket_created') !!}
    </div>
@endif
    <div class="mx-4">
        <h1>Ticket</h1>
        @if (count($tbl_ticket) > 0)
        <div class="d-flex flex-row">
        @foreach ($tbl_ticket as $ticket)
            {{ $ticket->name }}
        @endforeach
        </div>
        {{ $tbl_ticket->links() }}
        <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>ID</th>
                    <th>Ticket ID</th>
                    <th>Issued Date</th>
                    <th>Bus</th>
                    <th>Seat</th>
                    <th>Schedule</th>
                    <th>Ticket owner</th>
                    <th>Payment information</th>
                </thead>
                <tbody>
                @foreach ($tbl_ticket as $ticket)
                    <tr>
                        <td>
                            <div>{{ $ticket->id }}</div>
                        </td>
                        <td>
                            <div><a href="{{route('ticket.view', $ticket->id)}}">{{ $ticket->ticket_id}}</a></div>
                        </td>
                        <td>
                            <div>{{ $ticket->is_issued}}</div>
                        </td>
                        <td>
                            <div>{{ $ticket->bus_seat->bus->bus_plate }}</div>
                        </td>
                        <td>
                            <div>{{ $ticket->bus_seat->seat_number }}</div>
                        </td>
                        <td>
                            <div>{{ $ticket->schedule_id }}</div>
                        </td>
                        <td>
                            <div>{{ $ticket->payment->user->username }}</div>
                        </td>
                        <td>
                            <div><a href="{{route('payment.view', $ticket->payment->id)}}">{{ $ticket->payment->id }}</a> - {{ $ticket->payment->payment_method }}</div>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{!! route('ticket.edit', $ticket->id) !!}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
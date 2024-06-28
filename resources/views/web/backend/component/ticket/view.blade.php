@extends('web.backend.layout.admin')
@section('content')
@if(Session::has('ticket_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('ticket_updated') !!}
    </div>
    @endif
@if(Session::has('ticket_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('ticket_deleted') !!}
            @endif
        </div>
        @if(Session::has('ticket_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('ticket_created') !!}
                </div>
                @endif
        <div class="mx-4">
            @if (count($tbl_ticket) > 0)
            <a class="btn btn-primary" href="{{url('/ticket/create')}}">Create</a>
            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Ticket ID</th>
                        <th>Issued Date</th>
                        <th>Bus information</th>
                        <th>Seat information</th>
                        <th>Schedule</th>
                        <th>Carry on</th>
                        <th>Luggage</th>
                        <th>Ticket owner</th>
                        <th>Paid?</th>
                        <th>Payment method</th>
                    </thead>
                    <tbody>
                    @foreach ($tbl_ticket as $ticket)
                        <tr>
                            <td>
                                <div><a href="{{url('/ticket/'.$ticket->id)}}">{{ $ticket->ticket_id}}</a></div>
                            </td>
                            <td>
                                <div>{{ $ticket->is_issued}}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->bus_seat->bus->bus_plate }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->bus_seat->seat->seat_number }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->schedule}}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->carry_on }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->luggage }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->user->name }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->is_paid }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->paid_by }}</div>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{!! url('ticket/' . $ticket->id . '/edit') !!}">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(array('url'=>'ticket/'. $ticket->id, 'method'=>'DELETE')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                 <button class="btn btn-danger delete">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    @endif
@endsection
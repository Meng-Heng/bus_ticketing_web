@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('seat_deleted'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('seat_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
            <h1>Seats</h1>
                @if (count($tbl_seat) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                    <a class="btn btn-primary" href="{{route('seat.create')}}">Create</a>
                </div>
                        @foreach ($tbl_seat as $seat)
                        {{ $seat->name }}
                        @endforeach
                        {{ $tbl_seat->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ID</th>
                                <th>Bus ID</th>
                                <th>Seat Number</th>
                                <th>Seat Type</th>
                                <th>Storage ID</th>
                                <th>Price ID</th>
                                <th>Sold</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_seat as $seat)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('seat.show', $seat->id)}}">{{ $seat->id }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->bus_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->seat_number !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->seat_type !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->storage_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->price_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $seat->status !!}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('seat.edit', $seat->id) }}">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @endsection
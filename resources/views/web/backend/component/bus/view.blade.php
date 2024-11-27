@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('bus_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('bus_deleted') !!}
            @endif
        </div>
        <div class="mx-4">
                @if (count($tbl_bus) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{route('bus.create')}}">Create</a>
                    </div>
                        @foreach ($tbl_bus as $bus)
                        {{ $bus->name }}
                        @endforeach
                        {{ $tbl_bus->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Bus Plate Number</th>
                                <th>Description</th>
                                <th>Total Seat</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_bus as $buses)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('bus.show', $buses->id)}}">{{ $buses->bus_plate }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $buses->description !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $buses->total_seat !!}</div>
                                    </td>
                                    <td>
                                        @if ($buses->is_active == 0)
                                        <span style="color:red">Inactive</span>
                                            @elseif ($buses->is_active == 1)
                                            <span style="color:lime">Active</span>
                                        @endif
                                    </td>

                                    <td><a class="btn btn-primary" href="{{route('bus.edit', $buses->id) }}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('route'=>['bus.delete', $buses->id], 'method'=>'DELETE')) !!}
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
                <script>
                    $(".delete").click(function() {
                        var form = $(this).closest('form');
                        $('<div></div>').appendTo('body')
                            .html('<div><h6> Are you sure ?</h6></div>')
                            .dialog({
                                modal: true,
                                title: 'Delete message',
                                zIndex: 10000,
                                autoOpen: true,
                                width: 'auto',
                                resizable: false,
                                buttons: {
                                    Yes: function() {
                                        $(this).dialog('close');
                                        form.submit();
                                    },
                                    No: function() {
                                        $(this).dialog("close");
                                        return false;
                                    }
                                },
                                close: function(event, ui) {
                                    $(this).remove();
                                }
                            });
                        return false;
                    });
                </script>
                @endif
                @endsection
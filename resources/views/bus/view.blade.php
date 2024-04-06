@extends('layout.backend')
@section('content')
        @if(Session::has('bus_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('bus_deleted') !!}
            @endif
        </div>
        
        <div class="mx-4">
                @if (count($tbl_bus) > 0)
                <a class="btn btn-primary" href="{{url('/bus/create')}}">Create</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Bus Plate Number</th>
                                <th>Description</th>
                                <th>Active status</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_bus as $buses)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{url('/bus/'.$buses->id)}}">{{ $buses->bus_plate }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $buses->description !!}</div>
                                    </td>
                                    <td>
                                        @if ($buses->is_active == 0)
                                        <span style="color:red">Out of Order</span>
                                            @elseif ($buses->is_active == 1)
                                            <span style="color:lime">OK</span>
                                        @endif
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('bus/' . $buses->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('url'=>'bus/'. $buses->id, 'method'=>'DELETE')) !!}
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
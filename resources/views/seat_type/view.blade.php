@extends('layout.backend')
@section('content')
        @if(Session::has('seat_type_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('seat_type_deleted') !!}
            @endif
        </div>
        
        <div class="mx-4">
                @if (count($tbl_seat_type) > 0)
                <a class="btn btn-primary" href="{{url('/seat-type/create')}}">Create</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Seat Type's Name</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_seat_type as $seat_types)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{url('/seat-type/'.$seat_types->id)}}">{{ $seat_types->name }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $seat_types->description !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('seat-type/' . $seat_types->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('url'=>'seat-type/'. $seat_types->id, 'method'=>'DELETE')) !!}
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
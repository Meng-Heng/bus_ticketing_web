@extends('layout.backend')
@section('content')
        @if(Session::has('station'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('station_deleted') !!}
            @endif
        </div>
        
        <div class="mx-4">
                @if (count($tbl_station) > 0)
                <a class="btn btn-primary" href="{{url('/station/create')}}">Create</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Station Name</th>
                                <th>Primary address</th>
                                <th>Secondary Name</th>
                                <th>Commune</th>
                                <th>District</th>
                                <th>City</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_station as $stations)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{url('/station/'.$stations->id)}}">{{ $stations->name }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $stations->p_address !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $stations->s_address !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $stations->commune !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $stations->district !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $stations->city !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('station/' . $stations->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {{ Form::open(array('url'=>'station/'. $stations->id, 'method'=>'DELETE')) }}
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
@extends('web.backend.layout.admin')
@section('content')
        @if(Session::has('storage_deleted'))
        <div class="alert alert-danger alert-dismissible">
        
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Deleted!</strong> {!! session('storage_deleted') !!}
            @endif
        </div>
        
        <div class="mx-4">
                @if (count($tbl_storage) > 0)
                <a class="btn btn-primary" href="{{route('storage.create')}}">Create</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Storage capacity</th>
                                <th>Measurement</th>
                                <th>Start Date</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_storage as $storage)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('storage.show', $storage->id)}}">{{ $storage->luggage }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $storage->measurement !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $storage->start_date !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! route('storage.edit', $storage->id) !!}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @endif
                @endsection
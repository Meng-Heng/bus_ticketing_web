@extends('web.backend.layout.admin')
@section('content')
        <div class="mx-4">
            <h1>Price</h1>
                @if (count($tbl_price) > 0)
                <div class="d-flex flex-row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{route('price.create')}}">Create</a>
                    </div>
                        @foreach ($tbl_price as $price)
                        {{ $price->name }}
                        @endforeach
                        {{ $tbl_price->links() }}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Price</th>
                                <th>Currency</th>
                                <th>Start Date</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_price as $price)
                                <tr>
                                    <td>
                                        <div class=""><a href="{{route('price.show', $price->id)}}">{{ $price->price }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $price->currency !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $price->start_date !!}</div>
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('price.edit', $price->id) }}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @endif
                @endsection
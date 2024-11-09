@extends('web.backend.layout.admin')
@section('content')
        <div class="mx-4">
                @if (count($tbl_payment) > 0)
                <a class="btn btn-primary" href="{{url('/seat-type/create')}}">Create</a>
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Payment ID</th>
                                <th>Payment Method</th>
                                <th>Payment Date/Time</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_payment as $payment)
                                <tr>
                                    <td>
                                        <div class="">{{ $payment->id }}</a></div>
                                    </td>
                                    <td>
                                        <div class=""><a href="{{url('dashboard/payment/'.$payment->id)}}">{{ $payment->payment_method }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $payment->payment_datetime !!}</div>
                                    </td>
                                    <td><a class="btn btn-primary" href="{!! url('dashboard/payment/' . $payment->id . '/edit') !!}">Edit</a></td>
                                    <td>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    @foreach ($tbl_payment as $payment)
                        {{ $payment->name }}
                    @endforeach
                </div>
                 
                {{ $tbl_payment->links() }}
                
                @endif
                @endsection
@extends('web.backend.layout.admin')
@section('content')
        <div class="mx-4">
            
            <div class="container">
                @foreach ($tbl_payment as $payment)
                    {{ $payment->name }}
                @endforeach
            </div>
             
            {{ $tbl_payment->links() }}
                @if (count($tbl_payment) > 0)
                <div class="panel panel-default">
                
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Payment ID</th>
                                <th>Payment Method</th>
                                <th>Payment Date/Time</th>
                                <th>User</th>
                            </thead>
                            <tbody>
                                @foreach ($tbl_payment as $payment)
                                <tr>
                                    <td>
                                        <div class="">{{ $payment->id }}</a></div>
                                    </td>
                                    <td>
                                        <div class=""><a href="{{route('payment.view', $payment->id)}}">{{ $payment->payment_method }}</a></div>
                                    </td>
                                    <td>
                                        <div>{!! $payment->payment_datetime !!}</div>
                                    </td>
                                    <td>
                                        <div><a href="{{ route('user.show', $payment->user->id)}}">{{ $payment->user_id}}</a></div>
                                    </td>
                                    <td>
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
@extends('web.backend.layout.admin')
@section('content')
    @if(Session::has('feedback_updated'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Updated!</strong> {!! session('feedback_updated') !!}
    </div>
    @endif
    @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Something is Wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ Form::model($tbl_review , array('route' => array('feedback.update', $tbl_review->id), 'method'=>'PUT')) }}
    {!! Form::label('star', 'Star:') !!}
    <input class="form-control" type="text" name="star" value="{{$tbl_review->star}}" readonly>
    <br>
    {!! Form::label('feedback', 'Feedback:') !!}
    {!! Form::textarea('feedback',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('payment_id', 'Payment:') !!}
    <input class="form-control" type="text" name="payment_id" value="{{$tbl_review->payment_id}}" readonly>
    <br>
    {!! Form::label('user_id', 'User:') !!}
    <input class="form-control" type="text" name="user_id" value="{{$tbl_review->user_id}}" readonly>
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    <a class="btn btn-primary" href="{!! route('feedback.view')!!}">Back</a>
@endsection

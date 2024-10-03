@extends('web.frontend.template.layout')

@section('content')
@if(Auth::user())
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4 d-flex justify-content-center">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{Auth::user()->username}}</h5>
              <p class="text-muted mb-1">{{Auth::user()->email}}</p>
              <p class="text-muted mb-4">{{Auth::user()->contact}}</p>
            </div>
          </div>
        </div>
        <div class="row mt-2">
        <h5>Personal Information</h5>
            {{ Form::model($tbl_user , array('route' => array('profile.update', $tbl_user->id), 'method'=>'PUT')) }}
            <div class="row">
                <div class="col-5">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username',null, array('class'=>'form-control')) !!}
                </div>
                <div class="col-5">
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::select('gender',["Unspecified","Male", "Female", "Prefer not to say"], array('class'=>'form-control')) !!}
            </div>
            <div class="row">
                <div class="col-5">
                {!! Form::label('id_card', 'Identification Number or Passport:') !!}
                {!! Form::text('id_card',null, array('class'=>'form-control')) !!}
                </div>
                <div class="col">
                {!! Form::label('date_of_birth', 'Date of Birth:') !!}
                {!! Form::text('date_of_birth',null, array('class'=>'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row mt-3">
        <h5>Contact Information</h5>
            <div class="row">
                <div class="col">
                {!! Form::label('contact', 'Phone Number:') !!}
                {!! Form::text('contact',null, array('class'=>'form-control')) !!}
                </div>
                <div class="col">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email',null, array('class'=>'form-control')) !!}
                </div>
            </div>
            <div class="row">
                <div class="col">
                {!! Form::label('hometown', 'Hometown:') !!}
                {!! Form::text('hometown',null, array('class'=>'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h5>Activity</h5>
            <div class="row">  
                <label>Created: {{Auth::user()->created_at}}</label>
            </div>
            <div class="row">
                <label>Last Updated: {{Auth::user()->created_at}}</label>
            </div>
            <div class="col-md">
                
            </div>
        </div>
        <div class="mt-5 text-center">
        {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
        </div>     
      </div>
    </div>
  </section>
@endif
@endsection

@extends('web.frontend.template.layout')

@section('profile-style')
  <link href="{{asset('css/main/profile.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <span class="font-weight-bold">{{Auth::user()->username}}</span>
              <span class="text-black-50">{{Auth::user()->email}}</span>
              <span>{{Auth::user()->contact}}</span>
              <!-- Display error for date_of_birth -->
              @error('date_of_birth')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              @error('username')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              @error('contact')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              @error('hometown')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              @error('id_card')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              <!-- Display error for profile_picture -->
              @error('profile_picture')
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                {{ Form::model($tbl_user , array('route' => array('profile.update', $tbl_user->id), 'method'=>'PUT')) }}
                @method('PUT')
                @csrf
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit your profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="labels">Username</label>
                      {!! Form::text('username',null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="col-md-6">
                      <label class="labels">Gender</label>
                      <div>
                        <select name="gender" id="">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                      </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                      <label class="labels">Contact</label>
                      {!! Form::text('contact', null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="col-md-12">
                      <label class="labels">Email</label>
                      {!! Form::text('email', null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="col-md-12">
                      <label class="labels">Identification number</label>
                      {!! Form::text('id_card', null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="col-md-12">
                      <label class="labels">Hometown</label>
                      {!! Form::text('hometown', null, array('class'=>'form-control')) !!}
                    </div>
                    <div class="col-md-12">
                      <label class="labels">Date of Birth</label>
                      {!! Form::date('date_of_birth', null, array('class'=>'form-control')) !!}
                    </div>
                    {{-- <div class="col-md-12"><label class="labels">Picture</label>
                      <div>
                        {!! Form::file('picture',null, array('class'=>'form-control')) !!}
                      </div>
                    </div> --}}
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Account created at</label>
                      <input type="text" class="form-control" value="{{Auth::user()->created_at}}" readonly>
                    </div>
                    <div class="col-md-6"><label class="labels">Last updated</label>
                      <input type="text" class="form-control" value="{{Auth::user()->updated_at}}" readonly>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    {!! Form::submit('Save Profile', array('class'=>'btn btn-primary profile-button')) !!}
                    {!! Form::close() !!}
                    <button class="btn btn-danger">
                        <a class="logout" href="{{url('profile/'.Auth::user()->id)}}">Back</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
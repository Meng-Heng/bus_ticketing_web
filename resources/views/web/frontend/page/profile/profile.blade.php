@extends('web.frontend.template.layout')

@section('profile-style')
  <link href="{{asset('css/main/profile.css')}}" rel="stylesheet" />
@endsection

@section('content')
@if(Auth::user())
<div class="container rounded bg-white mt-5 mb-5">
  <div class="row">
      <div class="col-md-3 border-right">
        {{ Form::model($tbl_user , array('route' => array('profile.update', $tbl_user->id), 'method'=>'PUT')) }}
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          
            @if(Auth::user()->picture)
              <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . $user->picture) }}">
            @endif
            <input type="file" name="picture" id="picture" class="form-control">
            <span class="font-weight-bold">{{Auth::user()->username}}</span>
            <span class="text-black-50">{{Auth::user()->email}}</span>
            <span>{{Auth::user()->contact}}</span>
            <!-- Display error for date_of_birth -->
            @error('date_of_birth')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <!-- Display error for profile_picture -->
            @error('profile_picture')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
      </div>
      <div class="col-md-8 border-right">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Your Profile</h4>
              </div>
              <div class="row mt-2">
                  <div class="col-md-6"><label class="labels">Username</label>
                    {!! Form::text('username',null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="col-md-6"><label class="labels">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                      <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                  </select>
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-12"><label class="labels">Contact</label>
                    {!! Form::text('contact',null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="col-md-12"><label class="labels">Email</label>
                    {!! Form::text('email',null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="col-md-12"><label class="labels">Identification number</label>
                    {!! Form::text('id_card',null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="col-md-12"><label class="labels">Hometown</label>
                    {!! Form::text('hometown',null, array('class'=>'form-control')) !!}
                  </div>
                  <div class="col-md-12"><label class="labels">Date of Birth</label>
                    {!! Form::date('date_of_birth',null, array('class'=>'form-control')) !!}
                  </div>
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
              <button class="btn btn-danger" type="button" href="{{route('logout')}}">Logout</button>
              </div>
          </div>
      </div>
  </div>
</div>
@endif
@endsection

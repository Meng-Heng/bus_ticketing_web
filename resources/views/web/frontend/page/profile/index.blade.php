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
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                {!! Form::model($user , array('route' => array('profile.index', $user->id),'method'=>'GET','files'=>'true')) !!}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Your Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Username</label>
                      {!! Form::text('username',null, array('class'=>'form-control'), 'readonly') !!}
                    </div>
                    <div class="col-md-6"><label class="labels">Gender</label>
                      <div>
                      {!! Form::select('gender',['Male','Female','Other'], array('class'=>'form-control', 'name'=>'gender', 'id'=>'gender')) !!}
                      </div>
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
                    <div class="col-md-12"><label class="labels">Picture</label>
                      <div>
                        {!! Form::file('picture',null, array('class'=>'form-control')) !!}
                      </div>
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
                    <button class="btn green-btn">
                        <a class="edit-profile" href="{{url('profile/'.Auth::user()->id.'/edit')}}">Edit</a>
                    </button>
                    <button class="btn btn-danger"><a class="logout" href="{{route('logout')}}">Logout</a></button>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
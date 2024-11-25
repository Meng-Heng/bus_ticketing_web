@extends('auth.index')

@section('content')
    <div class="container" id="container">
        <div class="form-container auth">
        <form method="POST" action="{{route('login')}}">
          {{ method_field('POST')}}
          @csrf
          {{-- Sign in with Google --}}
          <h1>{{__('Sign In')}}</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
          </div>
          {{-- Email --}}
          <span>{{__("or use your email and password")}}</span>
          <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"/>
          @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
          {{-- Password --}}
          <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"/>
          @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
          {{-- Recaptcha --}}
          <div class="input-group" style="margin-top: 10px">
            {!! htmlFormSnippet() !!}
          </div>
          @error('g-recaptcha-response')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          {{-- Forgot Password --}}
          <button id="login" type="submit">{{__("Sign In")}}</button>
          @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
        </form>
        {{-- Sign up Button --}}
        <div class="goto goto-signup">
          <hr>
          <p>{{__("Are you new?")}}</p>
          <a href="/register">{{__("Register here")}}</button>
        </div>
      </div>
    </div>
    @if(session('login-fail'))
    <script>        
        $(document).ready(function() {
            toastr.success("{{ session('fail') }}");
        });
    </script>
    @endif
@endsection

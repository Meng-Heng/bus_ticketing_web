<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    
    <link rel="icon" href="{{ url('images/logo/logo.png') }}">
    <link rel="stylesheet" href="{{asset('css/template/auth.css')}}" />
    <title>Authentication</title>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form method="POST" action="{{route('register.user')}}">
          {{ method_field('POST')}}
          @csrf
          <h1>{{__("Create Account")}}</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
          </div>
          <span>{{__("Your information")}}</span>
          <input type="text" name="username" placeholder="Username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror"/>
          @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"/>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group">
            <input id="password" type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"/>
            <span class="show-password"><i class="fa-solid fa-eye"></i></span>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          <div class="input-group">
          <input id="password-confirm" type="password" name="password_confirmation" placeholder="Re-enter Password" class="form-control @error('password_confirmation') is-invalid @enderror"/>
          <span class="show-confirm-password"><i class="fa-solid fa-eye"></i></span>
          </div>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <button type="submit">{{__("Sign Up")}}</button>
        </form>
        <div class="goto goto-signin">
          
        <hr>
          <p>{{__("Have an account?")}}</p>
          <a href="login">{{__("Sign In")}}</a>
        </div>
      </div>
    </div>
    <script src="{{asset('js/auth.js')}}"></script>
  </body>
</html>

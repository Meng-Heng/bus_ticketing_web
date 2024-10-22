<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('css/template/auth.css')}}" />
</head>
<body>
    <div class="container" id="container">
        <div class="form-container auth">
        <form method="POST" action="{{route('login.user')}}">
          {{ method_field('POST')}}
          @csrf
          <h1>{{__('Sign In')}}</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          </div>
          <span>{{__("or use your email and password")}}</span>
          <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"/>
          @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
          <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"/>
          @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
          <a href="#">{{__("Forget Your Password?")}}</a>
          <button id="login" type="submit">{{__("Sign In")}}</button>
        </form>
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,300;1,400&display=swap" rel="stylesheet">
    <title>Login - Lelang.ID</title>
</head>
<body>
    <div class="login-register-bg">
        <div class="login-register-con">
            <div class="login-register-left">
                <div class="login-register-left-title">
                    <h1>Welcome Back!</h1>
                    <p>Login for awesome auction experience</p>
                </div>
                <div class="login-register-illustration">
                    <img src="/storage/res/illustration_1.png" alt="">
                </div>
            </div>
            <div class="login-register-right">
                <div class="login-register-logo login-logo">
                    <a href="/">
                        <img src="/storage/res/lelangid_logo2.png" alt="">
                    </a>          
                </div>
                <div class="login-register-right-title">
                    <h2>Login</h2>
                    <hr>
                </div>
                <div class="login-register-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                
        
                        <div class="form-input">
                            {{-- <label for="email" class="">{{ __('E-Mail Address') }}</label> --}}
                            @if(Cookie::has('email'))
                                <input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="{{ Cookie::get('email') }}" required autocomplete="email" autofocus>
                            @else
                                <input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @endif
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-input">
                            {{-- <label for="password" class="">{{ __('Password') }}</label> --}}
                            @if (Cookie::has('password'))
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" value="{{ Cookie::get('password') }}" required autocomplete="current-password">
                            @else
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            @endif
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="remember-me">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                            <label class="" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
        
                        <button type="submit" class="">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
                {{-- <div class="login-register-form">
                    <form action="POST">
                        <div class="form-input">
                            <input type="email" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-input">
                            <input type="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit">
                            Login
                        </button>
                    </form>
                </div> --}}
                <div class="login-register-msg">
                    <p>Don't have an account?</p>
                    <a href="/register" class="yellow-text">Create now</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
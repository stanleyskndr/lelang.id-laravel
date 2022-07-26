<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,300;1,400&display=swap" rel="stylesheet">
    <title>Register - Lelang.ID</title>
</head>
<body>
    <div class="login-register-bg">
        <div class="login-register-con">
            <div class="login-register-left">
                <div class="login-register-left-title register-title">
                    <h1>JOIN US!</h1>
                    <p>for great auction expreriences</p>
                </div>
                <div class="login-register-illustration">
                    <img src="/storage/res/illustration_2.png" alt="">
                </div>
            </div>
            <div class="login-register-right">
                <div class="login-register-logo">
                    <a href="/">
                        <img src="/storage/res/lelangid_logo.png" alt="">
                    </a>         
                </div>
                <div class="login-register-right-title register-title">
                    <h2>Create Account</h2>
                    <hr>
                </div>
                <div class="login-register-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
        
                        <div class="form-input">
                            {{-- <label for="username" class="">{{ __('Username') }}</label> --}}
                            <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-input">
                            {{-- <label for="email" class="">{{ __('E-Mail Address') }}</label> --}}
                            <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-input">
                            {{-- <label for="password" class="">{{ __('Password') }}</label> --}}
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-input">
                            {{-- <label for="password-confirm" class="">{{ __('Confirm Password') }}</label> --}}
                            <input id="password-confirm" placeholder="Re-enter Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
        
                        <button type="submit" class="">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
                <div class="login-register-msg">
                    <p>Already have an account? </p>
                    <a href="/login" class="yellow-text">Login</a>
                </div>
            </div>
        </div> 
    </div>
    
</body>
</html>
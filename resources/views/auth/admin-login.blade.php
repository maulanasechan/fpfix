<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Login</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body style="background-color: #354857">
        <img src="/img/mppl1.png" class="login-img1">
        <img src="/img/mppl3.png" class="login-img2" style="height: 22%; top: 30%;">
        <img src="/img/mppl4.png" class="login-img3">
        <img src="/img/mppl6.png" class="login-img4">
        <img src="/img/mppl7.png" class="login-img5">
        <a href="/" class="login-link">User Login</a>
        <p class="judul" style="color: white; top: 13%; left: 32%; font-size: 300%;">Admin</p>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
                <center>
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                </center>
                <center>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                </center>

                <center>
                    <button type="submit" class="round-button-login-new" style="margin-top: 13px;">
                        {{ __('Login') }}
                    </button>
                </center>
                
                <div class="login-link-text2">
                    <center>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="color: white">
                            {{ __('Remember Me') }}
                        </label>
                    </center>
                </div>         
        </form>
            @if ($errors->has('email'))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Email and Password do not match to our result !</strong>
                </div>
            @endif
    </body>
</html>

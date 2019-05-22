<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register User</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <a href="/" class="register-link">Login</a>
        <img src="/img/mppl9.png" class="login-img1">
        <img src="/img/mppl3.png" class="login-img2" style="height: 25%; top: 22%;">
        <img src="/img/mppl4.png" class="login-img6">
        <img src="/img/mppl8.png" class="login-img8">
        <img src="/img/mppl10.png" class="login-img7">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <center>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username" style="top: 50%; height: 7%">

                    @if ($errors->has('username'))
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    </div>
                    @endif
            </center>

            <center>
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email" style="top: 58%; height: 7%">

                    @if ($errors->has('email'))
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                    @endif
            </center>

            <center>
                    <input id="alamat" type="text" name="alamat" required placeholder="Alamat" value="{{ old('alamat') }}" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" style="top: 66%; height: 7%">

                    @if ($errors->has('alamat'))
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('alamat') }}</strong>
                        </span>
                    </div>
                    @endif
            </center>

            <center>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" style="top: 74%; height: 7%">

                    @if ($errors->has('password'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    </div>
                    @endif
            </center>

            <center>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Re-type Password" style="top: 82%; height: 7%">
            </center>

            <center>
                    <input id="avatar" type="hidden" name="avatar" value="/img/user.jpg">
            </center>

            <center>
                    <button type="submit" class="round-button-login-new" style="top: 92.2%; width: 5%; height: 10%">
                        {{ __('Register') }}
                    </button>
            </center>       
        </form>
    </body>
</html>

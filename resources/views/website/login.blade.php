<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>

    @include('layoutWebs.header')
    <div class="container">
        <div class="box">
            <h2>Đăng nhập</h2>

            <form action="{{ route('confirmLogin') }}" method="POST">
                @csrf


                @if (session('success'))
                    <div class="  alert alert-danger">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="inputbox">
                    <input value="{{ old('email') }}" type="email" id="email" name="email" required autofocus>
                    <span class="textinput">Nhập tài khoản gmail</span>
                    @if ($errors->has('email'))
                        <span class="textdanger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="inputbox">
                    <input value="{{ old('password') }}" type="password" id="password" name="password" required
                        autofocus>
                    <span class="textinput">Nhập mật khẩu</span>
                    @if ($errors->has('password'))
                        <span class="textdanger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="forgot_password"><a href="#">Bạn quên mật khẩu?</a></div>
                <button class="login_button" type="submit">Đăng nhập</button>

            </form>
            <div class="letter">hoặc</div>
            <div class="login_link">Bạn chưa có tài khoản? <a href="{{ route('registerUser') }}">đăng ký ngay</a></div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>

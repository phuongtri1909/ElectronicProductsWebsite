<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" />
</head>

<body>
    @include('layoutWebs.header')

    <div class="container">
        <div class="box">
            <div class="back-login"> <a href=""><i class="fa-solid fa-arrow-left"></i></a> đăng ký tài khoản
            </div>

            <h2 class="tittle-log">Đăng ký</h2>

            <form action="{{ route('createUser') }}" method="POST">
                @csrf
                <div class="inputbox">
                    <input value="{{ old('phone') }}" type="text" id="phone" name="phone" required autofocus>
                    <span class="textinput">số điện thoại</span>
                    @if ($errors->has('phone'))
                    <span class="textdanger">{{ $errors->first('phone') }}</span>
                @endif
                </div>
              

                <div class="inputbox">
                    <input value="{{ old('email') }}" type="email" id="email" name="email" required autofocus>
                    <span class="textinput">Địa chỉ email</span>
                    @if ($errors->has('email'))
                    <span class="textdanger">{{ $errors->first('email') }}</span>
                @endif
                </div>


                <div class="inputbox">
                    <input value="{{ old('fullName') }}" type="text" id="fullName" name="fullName" required
                        autofocus>
                    <span class="textinput">Họ và tên</span>
                    @if ($errors->has('fullName'))
                    <span class="textdanger">{{ $errors->first('fullName') }}</span>
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
               

                <div class="inputbox">
                    <input value="{{ old('password') }}" type="password" id="password_confirmation"
                        name="password_confirmation" required autofocus>
                    <span class="textinput">xác nhận mật khẩu</span>
                    @if ($errors->has('password_confirmation'))
                    <span class="textdanger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                </div>
                


                <button class="signup_button" type="submit">Đăng ký</button>
            </form>
            <div class="letter">hoặc</div>
            <div class="login_link">Bạn đã có tài khoản? <a href="{{ route('loginUser') }}">đăng nhập ngay</a></div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/51a2bee5af.js" crossorigin="anonymous"></script>
</body>

</html>

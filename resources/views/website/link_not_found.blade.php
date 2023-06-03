<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang không tồn tại</title>

    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/link-not-found.css') }}" />

</head>
<body>
    @include('layoutWebs.header')

    <div class="container">
    <div class="notification">
        <i class="fa-solid fa-circle-exclamation"></i>
      
        <h2>Liên kết không tồn tại</h2>
        <p>Liên kết mà bạn đang cố gắng truy cập không tồn tại hoặc đã bị xóa.</p>
        <a href="{{ route('3TDL Store') }}">Quay lại trang chủ</a>
      </div>
    </div>
    @include('layoutWebs.ft')
</body>
</html>
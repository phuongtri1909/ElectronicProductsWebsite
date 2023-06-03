<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="{{ asset('css/comfirm.css') }}">
</head>

<body>
  
    <div class="modal-overlay"></div>

    <div class="confirmation-box">
        <div class="close-btn"><a href="{{ route('orderDetail') }}">&times;</a></div>

        <p>Bạn hãy xác nhận đơn hàng để đặt hàng</p>


        <form action="{{ route('comfirm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input hidden value="{{ $order_id }}" id="order_id" name="order_id" required autofocus>
            <button class="confirm-btn">
                Xác nhận
            </button>
        </form>


    </div>


</body>

</html>

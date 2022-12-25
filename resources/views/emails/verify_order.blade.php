<div style="padding: 15px; width: 600px; margin: auto; background: lightgreen">
    <h2>Xin chào: {{$order->cus->name}}</h2>
    <p>
        Dưới đây là thông tin đơn hàng của bạn, hãy vui lòng kiểm tra và xác nhận đơn hàng bằng cách click vào nút bấm phía dưới
    </p>
    <p>
        <b>Lưu ý:</b> Nếu sau khoảng thoeif gian .. bạn không xác nhận thì hệ thống sẽ loại bỏ đơn hàng của bạn, bạn phải đăng lý lại từ đâu
    </p>
    <h4>Chi tiết đơn hàng</h4>
    <p>Thông tin người đặt hàng/ nhận hàng</p>

    <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
            <th>Họ tên</th>
            <th>{{$order->cus->name}}</th>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>{{$order->cus->address}}</td>
        </tr>
    </table>

    <h4>Chi tiết đơn hàng</h4>
    
    <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
            <th>STT</th>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Số luọng</th>
            <th>Thành tiền</th>
        </tr>
        @foreach($order->details as $detal)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$detal->prod->name}}</td>
            <td>${{$detal->price}}</td>
            <td>{{$detal->quantity}}</td>
            <td>${{$detal->quantity * $detal->price}}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4">Tổng tiền</th>
            <th>{{$order->totalPrice()}}</th>
        </tr>
    </table>
    
    <hr>
    <a href="{{ route('cart.verify_order', $token) }}" style="
        display: inline-block;
        padding: 15px 25px;
        background: green;
        color: #fff;
        font-weight: bold
    ">Vefiry your account</a>

    <hr>
    
</div>
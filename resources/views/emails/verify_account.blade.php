<div style="padding: 15px; width: 350px; margin: auto; background: gray">
    <h2>Xin chào: {{$name}}</h2>
    <p>
        Vui lòng click vào nút bấm dưới đây để xác thực tài khoản của bạn, nếu sau khoảng thoeif gian .. bạn không xác nhận thì hệ thống sẽ loại bỏ tài khoản của bạn, bạn phải đăng lý lại từ đâu
    </p>

    <a href="{{ route('home.verify_account', $token) }}" style="
        display: inline-block;
        padding: 15px 25px;
        background: green;
        color: #fff;
        font-weight: bold
    ">Vefiry your account</a>
</div>
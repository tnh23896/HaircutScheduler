<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn Bạn Đã Đặt Lịch Dịch Vụ</title>
</head>
<body>

    <p>Chào <strong>{{ $booking->name }}</strong>,</p>

    <p>Chúng tôi xin chân thành cảm ơn bạn đã chọn dịch vụ của chúng tôi và đã đặt lịch hẹn vào ngày <strong>{{ $booking->day }}</strong>. Dưới đây là chi tiết về lịch hẹn của bạn:</p>

    <ul>
        <li><strong>Ngày và giờ:</strong> {{ $booking->day }} - {{ $booking->time }}</li>
        <li><strong>Nhân viên phục vụ:</strong> {{ $booking->admin->username }}</li>
    </ul>

    <p>Dịch vụ đã đặt bao gồm:</p>

    <ul>
      @foreach ($booking->booking_details as $item)
      <li>{{ $item->name }}</li>
      @endforeach
    </ul>

    <p>Nếu có bất kỳ thay đổi nào về lịch hẹn hoặc nếu bạn cần hỗ trợ thêm, vui lòng liên hệ với chúng tôi qua số điện thoại <strong>0394131363</strong> hoặc email <strong>thangcx2810@gmail.com</strong>. Chúng tôi sẽ rất vui lòng giúp đỡ bạn.</p>

    <p>Chúng tôi mong chờ một buổi hẹn tuyệt vời và hy vọng rằng dịch vụ của chúng tôi sẽ đáp ứng đúng những mong đợi của bạn.</p>

    <p>Xin chân thành cảm ơn và chúc bạn một ngày tốt lành!</p>

    <p>Trân trọng,<br>
    DTBARBER<br>
    0394131363</p>

</body>
</html>

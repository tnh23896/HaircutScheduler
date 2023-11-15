<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .header {
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: aliceblue;
        }

        .logo {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            font-size: 2em;
            text-align: center;
        }

        blockquote {
            margin-top: 0;
            line-height: 160%;
            font-size: 1em;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="table-wrapper">
            <img class="logo" src="{{ asset('dist/images/logonew2.png') }}" alt="logo">
            <h1><b>
                    <center>Liên hệ tới từ khách hàng</center>
                </b></h1>
            <blockquote>
                <p>Khách hàng: {{ $email }}</p>
                <p>Số điện thoại: {{$phone}}</p>
                <p>Lời nhắn: {{ $messages }}</p>
            </blockquote>
        </div>
    </div>

</body>

</html>

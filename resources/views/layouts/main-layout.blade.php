<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background: #000 url('/images/bg/black-leather.jpg') center no-repeat;
            background-size: cover;
            color: #ffcc00;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .full-height {
            height: calc(100vh - 40px);
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            padding-bottom: 50px;
        }

        .title {
            font-size: 84px;
            text-shadow: #FC0 1px 0 10px;
            display: inline-block;
            position: relative;
            text-transform: uppercase;
        }
        .subtitle{
            font-size: 24px;
            position: absolute;
            top: -8px;
            right: 24px;
        }

        .links > a {
            color: #ffcc00;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links > a:hover {
            text-shadow: #FC0 1px 0 10px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .footer_copy {
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            opacity: 0.5;
        }
    </style>
</head>
<body>

    @yield('content')

    <div class="footer_copy">
        Copyright <?= date('Y') ?> &copy; FEDIRKO.PRO. All rights reserved.
    </div>
</body>
</html>

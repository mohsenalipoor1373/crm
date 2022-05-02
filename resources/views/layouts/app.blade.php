<!DOCTYPE html>
<html lang="fa">
<head>
    <title>سیستم مدیریت</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login_page/css/main.css')}}">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="{{asset('login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">


    <style>
        @font-face {
            font-family: "Shabnam";
            src: url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.eot')}}"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.eot')}}") format("embedded-opentype"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.woff')}}") format("woff"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.ttf')}}") format("truetype");
        }
    </style>

</head>
<body style="font-family: Shabnam">

@yield('content')
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('login_page/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('login_page/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login_page/js/main.js')}}"></script>

</body>
</html>

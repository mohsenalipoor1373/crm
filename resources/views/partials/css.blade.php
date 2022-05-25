<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/dist/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatables.bootstrap-rtl.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/minimal.css')}}">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/kamadatepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dropzone.css')}}" rel="stylesheet" />


<style>
    .swal2-container.swal2-center>.swal2-popup {
        grid-column: 2;
        grid-row: 2;
        align-self: center;
        justify-self: center;
        font-size: 1em !important;
        font-family: Shabnam !important;
    }
</style>


    <style>
        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <style>
        .loader {
            position: fixed;
            opacity: 0.95;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 999999;
            background: url({{asset('assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5;
        }
    </style>


    <style>
        @font-face {
            font-family: "Shabnam";
            src: url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.eot')}}"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.eot')}}") format("embedded-opentype"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.woff')}}") format("woff"),
            url("{{asset('assets/fonts/Shabnam/Farsi-Digits/Shabnam-Bold-FD.ttf')}}") format("truetype");
        }
    </style>
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
    <style>
        .tata .tata-body {
            margin: 0;
            padding: 0 14px;
            min-height: 38px;
            min-width: 260px;
            margin-right: 20px !important;
        }

        .tata .tata-icon {
            font-size: 2em;
            color: inherit;
            margin-right: -20px;
        }

        .tata {
            position: fixed;
            display: flex;
            float: left;
            direction: ltr;
            text-align: right;
            justify-content: space-around;
            align-items: center;
            width: 300px;
            border-radius: 3px;
            color: #ffffff;
            font-size: 16px;
            z-index: 9999;
            pointer-events: auto;
            padding: 12px 14px 12px 20px;
            box-shadow: 0 24px 38px 3px rgb(0 0 0 / 14%), 0 9px 46px 8px rgb(0 0 0 / 12%), 0 11px 15px -7px rgb(0 0 0 / 20%);
        }
    </style>

<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        left:40px;
        background-color: #0080ff;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 2px #999;
    }

    .my-float{
        margin-top:22px;
    }
</style>

    <style>
        .dropzone .dz-preview .dz-image {
            width: 100px;
            height: 100px;
        }
        .dz-image img{
            width: 100px;
        }
    </style>

    @yield('css')

</head>

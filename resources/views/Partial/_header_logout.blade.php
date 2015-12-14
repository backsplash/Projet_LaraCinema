<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>@section('title') titre par defaut @show</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AbsoluteAdmin - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AbsoluteAdmin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('css')
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>


    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/skin/default_skin/css/theme.css')}}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin-tools/admin-forms/css/admin-forms.min.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

    <style>figure{width:100px;}
        .dt-panelmenu{background: #E9573F; }</style>
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="external-page sb-l-c sb-r-c">
    <div id="main" class="animated fadeIn">

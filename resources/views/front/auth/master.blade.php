<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ pagetitle()->get() }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset( 'css/front/main.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'css/front/global.css' ) }}">

    <link href="{{ asset( 'css/front/login.css' ) }}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="login mb-lg">
<div class="logo"></div>
<div class="content">
    @yield('content')
</div>

<script src="{{ asset( 'js/front/main.js' ) }}"></script>
<script src="{{ asset( 'js/front/plugins.js' ) }}"></script>
<script src="{{ asset( 'js/front/global.js' ) }}"></script>
<script src="{{ asset('js/front/login.js') }}"></script>
</body>

</html>
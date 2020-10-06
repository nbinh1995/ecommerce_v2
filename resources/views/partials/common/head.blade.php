<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.css')}}">
<link rel="stylesheet" href="{{ asset('css/style/style.css')}}">
@stack('top')
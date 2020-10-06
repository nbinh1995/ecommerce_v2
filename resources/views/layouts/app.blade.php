<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('partials.common.head')
  @yield('title')
</head>

<body>
  @include('partials.common.header')
  <main>
    @yield('content')
  </main>
  @include('partials.common.footer')
  @include('partials.common.script')
</body>

</html>
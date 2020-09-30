<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>SHOPPERS | @yield('title')</title>
  @include('partials.site.head')

</head>

<body>
  @include('partials.site.header')
  <main>
    @yield('content')
  </main>
  @include('partials.site.footer')
  @include('partials.site.script')
</body>

</html>
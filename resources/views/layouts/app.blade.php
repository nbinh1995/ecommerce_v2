<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('partials.site.head')
  @yield('title')
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
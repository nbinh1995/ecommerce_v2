<!DOCTYPE html>
<html>

<head>
    @include('partials.common.admin-head')
    <title>{{__('Dashboard')}} | @yield('title')</title>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('partials.common.admin-navbar')
        <!-- /.navbar -->

        @include('partials.common.admin-siderbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('partials.common.admin-content_header')
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('partials.common.admin-footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('partials.common.admin-script')

</body>

</html>
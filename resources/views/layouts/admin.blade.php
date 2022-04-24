<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('title')

<!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    @yield('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts.asidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #ebecf1">

    @yield('content')

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif

    @if (Session::has('error'))
    toastr.error("{{Session::get('error')}}")
    @endif

    @if (Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    @endif
</script>
@yield('scripts')
</body>
</html>

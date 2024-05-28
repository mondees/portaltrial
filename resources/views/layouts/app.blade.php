<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  @include('layouts.head')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

@php
  $userlogin = Auth::user();
@endphp

<body class="hold-transition skin-blue sidebar-mini {{ $userlogin->st_collapse == 'T' ? 'sidebar-collapse' : '' }}">
  <div class="wrapper">
    <div id="loading"
      style="display: none; margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8;">
      <p style="position: absolute; color: White; top: 50%; left: 45%;">
        <img src={{ asset('images/ajax-loader.gif') }}>
      </p>
    </div>

    <!-- Main Header -->
    @include('layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('layouts.footer')

    <!-- Control Sidebar -->
    {{-- @include('layouts.control_sidebar') --}}
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->
  @include('layouts.scripts')
  @yield('scripts')

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>

</html>

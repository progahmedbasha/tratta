<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
  <style>
    @font-face {
      font-family: Inkfree;
      src: url("{{url('dashboard/assets/css/Inkfree.ttf')}}");
    }

    body {
      background-image: url("{{ asset('dashboard/assets/icons/sidetop.svg') }}");
      background-repeat: no-repeat;
      background-size: 270px;
      font-family: Inkfree !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    input,
    p,
    select,
    ul,
    li,
    a,
    b,
    span,
    tr,
    td,
    option,
    label,
    button {
      font-family: Inkfree !important;
    }

    input[type=text],
    input[type=number],
    select:disabled,
    input[type=file],
    textarea {
      font-family: Inkfree !important;
    }
  </style>
  @include('dashboard.layouts.header')
  @include('dashboard.layouts.sweet-alert')

  <body class="g-sidenav-show  bg-gray-100">
    @include('dashboard.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      @include('dashboard.layouts.nav-bar')
      <!--   Core JS Files   -->
      @include('dashboard.layouts.javascript')


      <!-- End Navbar -->
      @yield('content')

    </main>

  </body>

</html>
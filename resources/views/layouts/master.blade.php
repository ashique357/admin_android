<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('partials.head')
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
      @include('partials.nav')
      @include('partials.sidebar')
      <div class="page-wrapper">
        @yield('body_component')
      </div>
    </div>
    @include('partials.footer')

</body>
</html>

<!DOCTYPE html>
<html>

<head>
  @include('admin.layouts.head')
</head>

<body>
  <div id="wrapper">
    @section('navbar_side')
    @show

    <div id="page-wrapper" class="@yield('page-bg')">
      <div class="row border-bottom">
        @include('admin.layouts.header')
      </div>
      @section('content')
        @show
      @include('admin.layouts.footer')

    </div>
  </div>

  @include('admin.layouts.js')

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>  @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('imgs/website/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('backend/css/backend-template.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
    <link href="{{ asset('backend/assets/css/style.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/css/layouts/rtl.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all" rel="stylesheet"
          type="text/css"/>
</head>

<body>
<!-- [ Pre-loader ] start -->

<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar icon-colored navbar-dark brand-dark header-lightblue">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('admin:dashboard') }}" class="b-brand">
                <div><img style="width: 100px;height: 40px; filter: brightness(10.5);     border-radius: 0 !important;" src="{{asset('images/storex.jfif')}}" class="rounded-circle">
                </div>
                <span class="b-title"></span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div" style="overflow-y: auto">
            @include('admin.partial.sidebar')
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-lightblue">
    @include('admin.partial.quick-actions')
    <P class="alert-success" id="delete">
    @yield('message')
    @php
        if (session('message')) {
        echo session('message');
        session('message' , null);
        }
    @endphp
</header>
<!-- [ Header ] end -->
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    @include('admin.partial.errors')
    <div id="app">
        @yield('content')
    </div>
</div>

<!-- dashboard-custom js -->
<script type="text/javascript" src="{{asset('js/backend-template.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('backend/js/app.js')}}"></script>--}}
<script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
{{--<script type="text/javascript" src="{{asset('backend/assets/js/custom/custom.js')}}"></script>--}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('scripts')
{{--@include('flashy::message')--}}
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({

  maximumSelectionLength: 2,
  placeholder: 'This is my placeholder',
  allowClear: true
});

    });
</script>

<script>

    let options = {"closeButton": true, "positionClass": "toast-top-center", "progressBar": true,};

    @if(count($errors))

    toastr.error("{{ $errors->first()}}", '', options);

    @endif

    @if(Session::has('alert-message'))

    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('alert-message') }}", "", options);
            break;
        case 'success':
            toastr.success("{{ Session::get('alert-message') }}", "", options);
            break;
        case 'warning':
            toastr.warning("{{ Session::get('alert-message') }}", "", options);
            break;
        case 'error':
            toastr.error("{{ Session::get('alert-message') }}", "", options);
            break;
    }

    // toastr.options.showEasing = 'swing';


    @endif

</script>

<script>
    $('#services-table').DataTable({
        "paging": false,
        "searching": false
    });
</script>
</body>
</html>

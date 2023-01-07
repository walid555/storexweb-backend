<!DOCTYPE html>
<html lang="en">

<head>
    <title> Sign in</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"> -->

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('imgs/website/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('backend/css/backend-template.css')}}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/style.css')}}" media="all" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all" rel="stylesheet"
          type="text/css" />
</head>

<body>
<div class="auth-wrapper">
{{--    <div class="content-video">--}}
{{--    <video class="elementor-background-video-hosted elementor-html5-video" autoplay="" muted="" playsinline="" loop="" --}}
{{--           src="https://hashibasha.slash-online.com/wp-content/uploads/2020/09/HBvideo_COMP.mp4" __idm_id__="643054593" style="width:100vw; height: 100vh;">--}}
{{--        --}}
{{--    </video>--}}
{{--    </div>--}}

    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">

            <form method="post" action="{{ route('admin:login') }}" id="loginForm">
                @csrf
                <div class="card-body text-center">
                    <div class="mb-4">
                        <!-- <i class="feather icon-unlock auth-icon"></i> -->
                        <img style="width: 100px;height: 70px;" src="{{asset('images/stroex.jfif')}}" class="rounded-circle">
                    </div>
                    <h3 class="mb-4">Login</h3>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="remember" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- Required Js -->
<script type="text/javascript" src="{{asset('js/backend-template.js')}}"></script>
{{--@include('flashy::message')--}}
<!-- Laravel Javascript Validation -->
{{--<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}
{{--{!! $validator->selector('#loginForm') !!}--}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(count($errors))

    toastr.error("{{ $errors->first()}}");

            @endif

            @if(Session::has('alert-message'))

    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('alert-message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('alert-message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('alert-message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('alert-message') }}");
            break;
    }

    // toastr.options.showEasing = 'swing';


    @endif

</script>

</body>

</html>

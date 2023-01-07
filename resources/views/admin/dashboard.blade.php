@extends('admin/layout')

@section('title')
    Dashboard
@endsection

@section('styles')
    <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
@endsection

@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <marquee class="blink">Welcome To Our Site</marquee>
                        <img style="width: 1300px;height: 600px;" src="{{asset('images/stroex1.jpg')}}">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

@endsection

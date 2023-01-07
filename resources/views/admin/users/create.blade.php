@extends('admin/layout')

@section('title')
    اضافة
@endsection
@section('content')
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">المستخدمين</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin:dashboard')}}"><i
                                                class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin:users.index') }}">المستخدمين</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">@yield('title')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                        {{-- <div class="col-sm-12">
                                <div class="alert alert-primary" role="alert">
                                    <p>Use our extra helper file for quick setup Form Components in your page - <a href="index-form-package.html" target="_blank" class="alert-link">CHECKOUT</a></p>
                                    <label class="text-muted">Copy/paste source code in your page in just couples of seconds.</label>
                                </div>
                            </div> --}}
                        <!-- [ form-element ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>اضافة</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="create_form" method="post" enctype="multipart/form-data"
                                                      action="{{ route('admin:users.store') }}">
                                                    @csrf

                                                    @include('admin.users.form')

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input group -->
                            </div>
                            <!-- [ form-element ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





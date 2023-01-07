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
                                    <h5 class="m-b-10">الاقسام</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin:dashboard')}}"><i
                                                    class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin:categories.index') }}">الاقسام</a>
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

                        <form id="create_form" method="post" enctype="multipart/form-data"
                              action="{{ route('admin:categories.store') }}">
                            @csrf

                            @include('admin.categories.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







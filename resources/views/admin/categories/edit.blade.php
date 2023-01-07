@extends('admin/layout')

@section('title')
   تحديث
@endsection

@section('styles')

@endsection


@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
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

                <div class="main-body">
                    <div class="page-wrapper">

                        <form action="{{route('admin:categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('admin.categories.form')
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

@endsection







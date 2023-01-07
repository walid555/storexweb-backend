@extends('admin/layout')

@section('title')
    المستخدمين
@endsection

@section('styles')
{{--    <link rel="stylesheet" href="{{asset('backend/assets/plugins/data-tables/css/datatables.min.css')}}">--}}
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
                                    <h5 class="m-b-10">@yield('title')</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin:dashboard') }}"><i
                                                    class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!"></a>@yield('title')</li>
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
                            <!-- [ HTML5 Export button ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header row col-sm-12">
                                        <div class=" col-sm-10">
                                        <h5>عرض</h5>
                                        </div>
                                        <div class=" col-sm-2">
                                            عدد المستخدمين  : {{count($users)}}
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: space-between">
                                        <a href="{{ route('admin:users.create') }}"
                                           class="btn btn-rounded btn-success add-button"><i
                                                    class="feather icon-plus-circle"></i>
                                            اضافة
                                        </a>
                                    </div>
                                    <div class="card-block">

                                        <div class="table-responsive">
                                            <table id="" class="display table nowrap table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>البريد الالكترونى</th>
                                                    <th>تاريخ الميلاد</th>
                                                    <th>تاريخ الانشاء</th>
                                                    <th>العمليات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td> {{ $loop->iteration }}</td>
                                                        <td>{{$user->name?? '----'}} </td>
                                                        <td>{{$user->email ?? '----'}}</td>
                                                        <td> {{ $user->birth_date->format('Y-m-d')?? '----' }}</td>
                                                        <td> {{ $user->created_at?? '----' }}</td>
                                                        <td>
                                                            <a onclick="redirect($(this).attr('href'));"
                                                               href="{{ route('admin:users.edit', $user->id) }}"
                                                               class="btn btn-lg"
                                                               title="تعديل" style="position:relative;background-color:#1b6d85;width: 50px">
                                                                <i class="fas fa-wrench" style="color:white;position:absolute;line-height: 24px;top:50%; margin-top: -12px;left: 7px;"></i>
                                                            </a>
                                                            <a data-toggle="modal" data-target="#deleteModal{{$user->id}}"  title="حذف"
                                                               class="btn btn-danger btn-lg views-b views-b3" href="#" style="position:relative;">
                                                                <i class="fa fa-trash" style="color: white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="pagination justify-content-center" style="text-align: center">
                                        {{$users->appends(request()->except('page'))->links()}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->

                        @foreach ($users as $user)
                            @include('admin.partial.delete-modal',
                            ['id'=>$user->id,'name'=>$user->name,'route'=>route('admin:users.destroy',$user->id)])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


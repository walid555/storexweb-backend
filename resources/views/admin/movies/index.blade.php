@extends('admin/layout')

@section('title')
    الافلام
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
                                            عدد الافلام  : {{count($movies)}}
                                        </div>
                                    </div>
                                    <div class="row col-sm-12" style="justify-content: space-between">
                                        <div class=" col-sm-9">
                                        <a href="{{ route('admin:movies.create') }}"
                                           class="btn btn-rounded btn-success add-button"><i
                                                    class="feather icon-plus-circle"></i>
                                            اضافة
                                        </a>
                                        </div>
                                        <div class="col-sm-3" style="margin-top: 20px">
                                      <form action="{{route('admin:movies.index')}}" method="get">
                                          @csrf
                                          <input type="text" name="search" value="{{request('search')}}" required>
                                          <button class="btn-primary" type="submit">بحث</button>
                                      </form>
                                        </div>
                                    </div>
                                    <div class="card-block">

                                        <div class="table-responsive">
                                            <table id="" class="display table nowrap table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>الوصف</th>
                                                    <th>التقييم</th>
                                                    <th>الصورة</th>
                                                    <th>القسم</th>
                                                    <th>تاريخ الانشاء</th>
                                                    <th>العمليات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($movies as $movie)
                                                    <tr>
                                                        <td> {{ $loop->iteration }}</td>
                                                        <td>{{$movie->title?? '----'}} </td>
                                                        <td>{{$movie->description ?? '----'}}</td>
                                                        <td>{{$movie->rate ?? '----'}}</td>
                                                        <td><a href="{{$movie->img->localUrl}}"><img src="{{$movie->img->localUrl ?? '----'}}" style="width: 50px; height: 50px; border-radius: 50%;"></a></td>
                                                        <td>{{$movie->category->title ?? '----'}}</td>
                                                        <td> {{ $movie->created_at?? '----' }}</td>
                                                        <td>
                                                            <a onclick="redirect($(this).attr('href'));"
                                                               href="{{ route('admin:movies.edit', $movie->id) }}"
                                                               class="btn btn-lg"
                                                               title="تعديل" style="position:relative;background-color:#1b6d85;width: 50px">
                                                                <i class="fas fa-wrench" style="color:white;position:absolute;line-height: 24px;top:50%; margin-top: -12px;left: 7px;"></i>
                                                            </a>
                                                            <a data-toggle="modal" data-target="#deleteModal{{$movie->id}}"  title="حذف"
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
                                        {{$movies->appends(request()->except('page'))->links()}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->

                        @foreach ($movies as $movie)
                            @include('admin.partial.delete-modal',
                            ['id'=>$movie->id,'name'=>$movie->title,'route'=>route('admin:movies.destroy',$movie->id)])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


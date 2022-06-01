@section('title')
    الرئيسية
@endsection
@extends('layouts.main')
@section('style')
    <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
    <!-- Slick css -->
    <link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')

    <!-- Start Contentbar -->
    <div class="contentbar">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <h4 class="text-center mb-3">الاحصائيات</h4>
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 " src="assets/images/petition.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mb-2">اجمالي البلاغات المكتملة</h5>
                                <p class="mb-0">  بلاغ {{$complete}}</p>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3 " src="assets/images/report.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mb-2">اجمالي البلاغات الغير مكتملة</h5>
                                <p class="mb-0">  بلاغ {{$incomplete}}</p>
                              
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <img class="ml-3" src="assets/images/crypto/ripple.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mb-2">اجمالي البلاغات</h5>
                                <p class="mb-0">  بلاغ {{$all_reports}}</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->

        </div>
        <!-- End row -->

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-12">
                <div class="card m-b-30 dash-widget">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h5 class="card-title mb-0">البلاغات النشطة</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم صاحب البلاغ</th>
                                    <th>نوع البلاغ</th>
                                    <th>رقم القاعة</th>
                                    <th>عنوان البلاغ</th>
                                    <th>تفاصيل البلاغ</th>
                                    <th>حالة البلاغ</th>
                                    <th>الخيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                
                                @role('الدعم الفني')
                               
                                @forelse ($active_reports as $report)
                                    <tr>


                                        <td>{{$i++}}</td>
                                        <td>{{$report->user->name}} </td>
                                        <td>{{$report->type->name}}</td>
                                        <td>{{$report->hall_number}}</td>
                                        <td>{{$report->title}}</td>
                                        <td>{{Str::of($report->body)->limit(10)}}</td>
                                        @php
                                            $use = $report->status === 'انتظار الموافقة' ? 'primary' : 'danger';
                                        @endphp
                                        <td><span class="badge badge-{{$use}}-inverse">{{$report->status}}
                                        </span></td>
                                        <td><a href="{{Route('admin.show',$report->id)}}" class="btn btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="رؤية البلاغ"><i class="feather icon-eye"></i></a></td>

                                        @empty
                                            <td style="position: relative;right: 44%;"><h1>لايوجد بلاغ نشط</h1></td>

                                    </tr>
                                @endforelse
                                @endrole


                                @role('رئيس قسم')
                               
                                @forelse ($managers as $manager)
                                
                                    @foreach($manager->reports as $report)
                                    <tr>


                                        <td>{{$i++}}</td>

                                        <td>{{$report->user->name}} </td>
                                        <td>{{$report->type->name}}</td>

                                        <td>{{$report->hall_number}}</td>
                                        <td>{{$report->title}}</td>
                                        <td>{{Str::of($report->body)->limit(10)}}</td>
                                        <td><span class="badge badge-primary-inverse">{{$report->status}}
                                        </span></td>
                                        <td><a href="{{Route('admin.show',$report->id)}}" class="btn btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="رؤية البلاغ"><i class="feather icon-eye"></i></a></td>
                                        @endforeach
                                        @empty
                                            <td style="position: relative;right: 44%;"><h1>لايوجد بلاغ نشط</h1></td>

                                    </tr>
                                @endforelse
                                @endrole
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->

    </div>

    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Apex js -->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Dashboard js -->
    <script src="{{ asset('assets/js/custom/custom-dashboard-crypto.js') }}"></script>
@endsection

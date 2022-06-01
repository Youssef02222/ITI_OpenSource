@section('title')
    البلاغات الغير مكتملة
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


        <!-- Start row -->
        <div class="row">

            <!-- Start col -->
            <div class="col-lg-12 col-xl-12">
                <div class="card m-b-30 dash-widget">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h5 class="card-title mb-0">البلاغات الغير مكتملة</h5>
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
                                @hasanyrole('رئيس قسم|الدعم الفني')
                                @foreach($manager as $report)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$report->user->name}} </td>
                                        <td>{{$report->type->name}}</td>
                                        <td>{{$report->hall_number}}</td>
                                        <td>{{$report->title}}</td>
                                        <td>{{$report->body}}</td>
                                        <td><span class="badge badge-danger-inverse">{{$report->status}}
                                        </span></td>
                                        <td><a href="{{Route('admin.show',$report->id)}}" class="btn btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="رؤية البلاغ"><i class="feather icon-eye"></i></a></td>

                                    </tr>
                                @endforeach
                                @else
                                    @foreach($reports as $report)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$report->user->name}} </td>
                                            <td>{{$report->type->name}}</td>
                                            <td>{{$report->hall_number}}</td>
                                            <td>{{$report->title}}</td>
                                            <td>{{$report->body}}</td>
                                            <td><span class="badge badge-danger-inverse">{{$report->status}}
                                        </span></td>
                                            <td><a href="{{Route('reports.show',$report->id)}}" class="btn btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="رؤية البلاغ"><i class="feather icon-eye"></i></a></td>

                                        </tr>
                                    @endforeach
                                    @endhasanyrole

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

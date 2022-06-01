<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/')}}" class="logo logo-small"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>

                            <a href="{{Route('home')}}">


                      <img src="{{asset('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>الرئيسية</span>
                    </a>

                </li>
                @role('رئيس قسم')
                <li>

                    <a href="{{Route('admin.index')}}">




                            <img src="{{asset('assets/images/svg-icon/settings.svg')}}" class="img-fluid" alt="dashboard"><span>لوحة التحكم</span>
                        </a>

                </li>
                @endrole
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets/images/svg-icon/chart.svg')}}" class="img-fluid" alt="basic"><span>البلاغات</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">

                            <li><a href="{{Route('reports.index')}}">جميع البلاغات</a></li>
                            <li><a href="{{Route('complete.report')}}">البلاغات المكتملة</a></li>
                            <li><a href="{{Route('incomplete.report')}}">البلاغات الغير مكتملة</a></li>

                    </ul>
                </li>

{{--                    <li>--}}
{{--                    <a href="javaScript:void();">--}}
{{--                        <img src="{{asset('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="chart"><span>فريق الدعم الفني</span>--}}
{{--                    </a>--}}
{{--                </li>--}}




                <li>
                    <a href="{{Route('reports.create')}}">
                        <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>بلاغ جديد</span><span class="badge badge-primary pull-left">اضافة</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>

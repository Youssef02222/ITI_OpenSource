@section('title')
    ملفك الشخصي
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


        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">@yield('title')</h5>
                </div>
                <div class="card-body">
                    @error('password_confirmed')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if(Session::has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{Route('profile.update')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">اسمك</label>
                                <input type="text" class="form-control" value="{{$user->name}}" readonly >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputAddress">البريد الالكتروني</label>
                                <input type="text"  class="form-control" id="inputAddress"  value="{{$user->email}}" readonly >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress2">الرقم الاكاديمي</label>
                                <input type="text" class="form-control" id="inputAddress2" value="{{$user->academic_number}}" readonly>
                            </div>

                            <div class="form-group col-md-7">
                                <label for="inputAddress2">كلمة المرور الجديدة</label>
                                <input type="password" class="form-control" id="inputAddress2" name="password">
                            </div>

                            <div class="form-group col-md-7">
                                <label for="inputAddress2">اعد كتابة كلمة المرور الجديدة</label>
                                <input type="password" class="form-control" id="inputAddress2"  name="password_confirmation" >
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">تغير كلمة المرور</button>
                    </form>
                </div>
            </div>
        </div>

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

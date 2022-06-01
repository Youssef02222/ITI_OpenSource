@section('title')
  اضافة بلاغ جديد
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
            <h6 class="card-subtitle">الرجاء توضيح المشكلة بشكل مفصل لكي تتم التعامل مع البلاغ بشكل احترافي</h6>
            <form action="{{Route('reports.store')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">اسم صاحب البلاغ</label>
                        <input type="text" class="form-control" value="{{auth()->user()->name}}" readonly >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">نوع البلاغ</label>
                        <select id="inputState" class="form-control" name="report_type">
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                        @error('report_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">رقم القاعة</label>
                    <input type="text"  class="form-control" id="inputAddress"  name="hall_number" placeholder="رقم القاعة">
                    @error('hall_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="inputAddress2">عنوان البلاغ</label>
                    <input type="text" class="form-control" id="inputAddress2" name="title" placeholder="اكتب هنا العنوان بشكل مختصر...">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">تفاصيل المشكلة</label>
                            <textarea class="form-control"  id="exampleFormControlTextarea1" placeholder="اكتب هنا تفاصيل المشكلة" name="body" rows="6"></textarea>
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">ارسال البلاغ</button>
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

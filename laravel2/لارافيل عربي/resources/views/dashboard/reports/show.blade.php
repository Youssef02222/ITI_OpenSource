@section('title')
    عرض البلاغ
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
        @if(Session::has('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-12">
                <div class="card  m-b-30 ">
                    <div class="card-header"><h5>تفاصيل البلاغ</h5></div>
                    <div class="card-body text-center">

                        <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-5">عنوان البلاغ</h3>

                        <h5 class="card-text text-dark">{{$report->title}}</h5>
                        <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-3">القسم : {{$report->type->name}}</h3>
                        <br>

                        <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-2"> رقم القاعة:<span class="text-danger"> {{$report->hall_number}}</span></h3>
                        <br>

                        @if($report->status === "مكتمل")
                            <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-3"> حالة البلاغ:<span class="text-success"> {{$report->status}}</span></h3>
                        @elseif($report->status === "غير مكتمل")
                            <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-3"> حالة البلاغ:<span class="text-danger"> {{$report->status}}</span></h3>

                        @elseif($report->status === "انتظار الموافقة")
                            <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-3"> حالة البلاغ:<span class="text-primary"> {{$report->status}}</span></h3>
                        @elseif($report->status === "مغلق")
                            <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-3"> حالة البلاغ:<span class="text-warning"> {{$report->status}}</span></h3>

                        @endif

                        <br>
                        <h3 class="card-title text-white bg-dark d-inline-block p-3 rounded my-5">تفاصيل المشكلة</h3>
                        <p class="card-text text-dark">{{$report->body}}</p>

                    </div>
<span class="p-3">صاحب البلاغ: <span class="text-danger">{{$report->user->name}}</span></span>
                    <span class="p-3">تاريخ البلاغ:{{$report->created_at}} </span>

                    <div class="col-lg-12 my-5">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="card-body">
                                <h6 class="bg-dark text-white d-inline-block p-3 rounded ">التواصل مع الدعم الفني</h6>
                                <hr>
                                <div class="media m-b-30 my-2">
                                    <div class="media-body">

                                        @foreach($comments as $comment)


{{--                                            {{ \App\Models\User::find($comment->user_id)->roles()->firstOrFail()->name}}--}}

                                            @if($report->user->name === $comment->user->name )
                                                <h5 class="mt-0 font-16">صاحب البلاغ: {{$comment->user->name}}</h5>
                                            @elseif($report->user->name !== $comment->user->name)
                                                <h5 class="mt-0 font-16 text-danger">{{$comment->user->profession}}: {{$comment->user->name}}</h5>
                                            @endif


                                                    @if($report->user->name === $comment->user->name )
                                                        <h3 class="bg-dark text-danger text-center p-2">{{$comment->comment}}</h3>
                                                    @elseif($report->user->name !== $comment->user->name)
                                                        <h3 class="bg-primary text-white text-center p-2">{{$comment->comment}}</h3>
                                                    @endif
                                        @endforeach

                                    </div>
                                </div>
                                <form action="{{Route('comment.store')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">اكتب تعليقك</label>
                                                <textarea class="form-control" {{$report->status === 'مغلق' || $report->status ===  'مكتمل' ? 'disabled' : ''}}  id="exampleFormControlTextarea1" placeholder="اكتب هنا تعليقك عن البلاغ" name="body" rows="6"></textarea>
                                                <input type="hidden" name="id" value="{{$report->id}}">
                                                <div class="form-group col-md-6 mx-auto ms-5">
                                                <button type="submit" {{$report->status === 'مغلق' || $report->status === 'مكتمل' ? 'disabled' : ''}} class="btn btn-dark text-white  btn-block my-2">ارسل تعليقك</button>
                                                </div>
                                        </div>
                                </form>

<hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-12 col-xl-12 p-3  text-center">
                        <h3 class="">الخيارات</h3>
                        <br>

                        <div class="form-group col-md-6 mx-auto ms-5">
                            <form class="mb-3" action="{{Route('close.report.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$report->id}}">
                                <button type="submit"  class="btn btn-danger my-2" {{$report->status === 'مغلق'?'disabled':''}}>{{$report->status === "مغلق" ? 'تم اغلاق البلاغ' : 'اغلاق البلاغ'}}</button>
                            </form>
                        </div>

                        @role('الدعم الفني')
                        @if($report->status !== 'مكتمل')
                        <form class="mb-3" action="{{Route('upload.report.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$report->id}}">
                            <button type="submit" class="btn btn-primary" {{$report->status === 'انتظار الموافقة'?'disabled':''}}>{{$report->status === "انتظار الموافقة" ? 'تم رفع البلاغ لرئيس القسم' : 'رفع البلاغ لرئيس القسم'}}</button>

                        </form>
                        @endif
                        @endrole

                        @role('الدعم الفني')
                        <form class="mb-3" action="{{Route('reports.destroy',$report->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary" >حذف البلاغ</button>

                        </form>
                        @endrole

                    </div>
                </div>
            </div>
        </div>

   <!-- end Contentbar -->
</div>



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

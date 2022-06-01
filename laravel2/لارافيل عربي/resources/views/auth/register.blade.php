<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="كلية التقنية قسم الصيانة">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>التسجيل - كلية التقنية قسم الصيانة</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box register-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-head">
                                            <a href="{{ route('register') }}" class="logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                                        </div>
                                        <h4 class="text-primary my-4">تسجيل حساب جديد</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="اسمك الكامل" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"   value="{{ old('email') }}" placeholder="بريدك الالكتروني" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="اعد كلمة المرور" required>
                                            @error('password_confirmed')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <h5>ماهي مهنتك؟</h5>
                                        @error('profession')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Radio1" name="profession" value="متدرب"  class="custom-control-input">
                                                <label class="custom-control-label" for="Radio1">متدرب</label>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Radio2" name="profession" value="مدرب" class="custom-control-input">
                                                <label class="custom-control-label" for="Radio2">مدرب</label>

                                            </div>
                                        </div>

                                        <div class="form-row mb-3">
                                            <div class="col-sm-12">
                                                @error('terms')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="custom-control custom-checkbox text-right">
                                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms">
                                                    <label class="custom-control-label font-14" for="terms">أوافق على شروط وأحكام الموقع</label>
                                                </div>
                                            </div>
                                        </div>
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">التسجيل</button>
                                    </form>
                                    <p class="mb-0 mt-3"> لديك حساب في الموقع؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <!-- End js -->
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="كلية التقنية قسم الصيانة">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تسجيل الدخول - كلية التقنية قسم الصيانة</title>
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
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                @error('academic_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-head">
                                            <a href="{{route('login')}}" class="logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                                        </div>
                                        <h4 class="text-primary my-4">تسجيل الدخول</h4>
                                        <div class="form-group">
                                            {{-- <input type="text" class="form-control" id="academic_number" name="academic_number" value="{{old('academic_number')}}"  placeholder="الرقم الاكاديمي" required> --}}
                                            <input id="login" type="text"
                                            class="form-control{{ $errors->has('academic_number') || $errors->has('email') ? ' is-invalid' : 'is-valid' }}"
                                            name="login_name" value="{{ old('academic_number') ?: old('email') }}" required autofocus>
                                            @if ($errors->has('username') || $errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" required>
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>invalid password</strong>
                                        </span>
                                    @endif
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox text-right">
                                                  <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                                  <label class="custom-control-label font-14" for="remember">تذكرني</label>
                                                </div>
                                            </div>

                                        </div>
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">تسجيل الدخول</button>
                                    </form>


                                    <p class="mb-0 mt-3">ليس لديك حساب؟ <a href="{{ route('register') }}">سجل  </a></p>
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

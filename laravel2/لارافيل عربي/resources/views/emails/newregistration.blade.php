<html>

<head>
    <title>{{trans('email.subject')}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        div {
            text-align: center;
            font-family: 'Cairo', sans-serif;
        }

        div h2 {
            font-size: 25px;
            color: #0080ff;
        }

        div p {
            color: #768396;
            font-size: 15px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div>
    <h2>{{ $newregistration['title'] }}</h2>
    <p>
        مرحبا بك في كلية التقنية قسم الصيانة هذه بيانات الدخول
    </p>
    <h2>الرقم الاكاديمي:</h2>
    <p>{{$newregistration['academic_number']}}</p>
    <h2>كلمة المرور:</h2>
    <p>{{$newregistration['password']}}</p>
    <h2>البريد الالكتروني:</h2>
    <p>{{$newregistration['email']}}</p>
    <p>اتمنى لك يوما عظيم</p>
</div>

</body>

</html>

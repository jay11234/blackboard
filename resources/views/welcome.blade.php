<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Can you hear Blackboard</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .boxed {
            border: 1px solid grey;
        }

        #mainnavlink{
            font-size: 20px;
            font-family: 'Anton', sans-serif;
        }

        #canyouhear {
            font-family: 'Modak', cursive;
            font-size: 20px;
            font-size: 35px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth

            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md" style="font-family: 'Modak', cursive; font-size:130px;
">
                <div class="boxed">
                    Can you hear
                    Blackboard?
                </div>

            </div>

            <div class="links">
                <a href="{{ url('/home') }}"    >Home</a>
                <a href="{{ url('/tutors/index') }}">Tutors</a>
                <a href="{{ url('/marks/index') }}">Marks</a>
                <a href="{{ url('/schedules/index') }}">Schedules</a>
                <a href="{{ url('/papers/index') }}">Papers</a>
            </div>
        </div>
    </div>
</body>

</html>
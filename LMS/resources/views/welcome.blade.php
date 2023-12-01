<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #cookies {
            background-color: rgba(45, 42, 42, 0.7);
            color: white;
            display: none;
            font-size: 18px
        }

        .c-container {
            width: 1600px;
            margin: auto;
            /* min-height: 100px; */
        }

        .c-sub-container {
            padding: 20px;
            width: 80%;
            margin: auto;
        }

        .cookies {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .cookies>p>a {
            color: rgb(209, 209, 77);
            text-decoration: none;
            font-weight: bolder
        }

        #cookies-btn {
            background: black;
            color: white;
            border: 3px solid white;
            padding: 7px;
            cursor: pointer;
            border-radius: 10px;
        }

        @media (max-width:1600px) {
            .c-container {
                width: 100%;
            }

        }
    </style>
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color:green; color: white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color: white">learners</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('detail_courses')}}" style="color: white">View Courses</a>
                    </li>
                 --}}

                </ul>
                <form class="d-flex" role="search">

                    @if (!Auth::user())
                        <a href="{{ route('login') }}" class="btn me-1 mt-1"
                            style="background-color: yellow; color:black">Login</a>

                        <a href="{{ route('register') }}" class="btn me-1 mt-1"
                            style="background-color: yellow; color:black">Signup</a>
                    @endif

                    @auth

                        <a href="{{ route('logout') }}" class="btn btn-success me-1 mt-1"
                            style="background-color: yellow; color:black">Logout</a>

                    @endauth

                </form>
            </div>
        </div>
    </nav>

    @yield('content')

   @auth
   <div id="cookies">
    <div class="c-container">
        <div class="c-sub-container">
            <div class="cookies">
                <p>This website allows cookies for a better user experience. <a href="#">More Info.</a></p>
                <button id="cookies-btn">I Agree</button>
            </div>
        </div>
    </div>
</div>
   @endauth
    <script>
        document.querySelector("#cookies-btn").addEventListener("click", () => {
            document.querySelector('#cookies').style.display = "none";
            setCookie("cookie", true, 365);
        });
    
        function setCookie(cName, cValue, expDays) {
            let date = new Date();
            date.setTime(date.getTime() + expDays * 24 * 60 * 60 * 1000);
            const expires = "expires=" + date.toUTCString();
            document.cookie = cName + "=" + cValue + ";" + expires + "; path=/";
        }
    
        function getCookie(cName) {
            const name = cName + "=";
            const decode = decodeURIComponent(document.cookie);
            const cArr = decode.split(";");
            let value;
            cArr.forEach((element) => {
                if (element.indexOf(name) === 0) {
                    value = element.substring(name.length);
                }
            });
            return value;
        }
    
        function cookieMsg() {
            if (!getCookie("cookie")) {
                document.querySelector('#cookies').style.display = "block";
            }
        }
    
        window.addEventListener('load', cookieMsg);
    </script>
    </body>

</html>

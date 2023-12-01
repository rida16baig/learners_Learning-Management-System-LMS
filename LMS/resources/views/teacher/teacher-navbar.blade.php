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
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg "  style="background-color:green; color: white">
        <div class="container-fluid">
            <a class="navbar-brand"  href="/" style="color: white">learners</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('teacher_dashboard')}}" style="color: white">Dashboard</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('show_courses')}}" style="color: white">View Courses</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: white">
                            Courses
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('all_courses')}}">All Courses</a></li>
                            <li><a class="dropdown-item" href="{{route('create_course')}}" >Create Course</a></li>
                            <li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: white">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('all_category')}}" >All Categories</a></li>
                            <li><a class="dropdown-item" href="{{route('create_category')}}" >Create Category</a></li>
                            <li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">

                    @if (!Auth::user())
                        <a href="{{ route('login') }}" class="btn me-2" style="background-color: yellow; color:black">Login</a>

                        <a href="{{ route('register') }}" class="btn me-2" style="background-color: yellow; color:black">Signup</a>
                    @endif

                    @auth

                        <a href="{{ route('logout') }}" class="btn btn-success me-2" style="background-color: yellow; color:black">Logout</a>

                    @endauth

                </form>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>

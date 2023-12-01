@extends('welcome')
@section('title', 'Student Dashboard')
<link rel="stylesheet" href="{{asset('css/student_dash.css')}}">

@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif

    <body>
        <div class="hero-container">
            <div class="hero-container-content " >
                <h1 class="text-center welcome-text"  >Welcome to
                    <span><i>learners</i></span>!
                </h1>
            </div>
            <div class="hero-container-img">
                <img src="{{ asset('storage/uploads/img/comupter.png') }}" class="comp-img" alt="img">
            </div>
        </div>


        <div class="courses">
            <h1 class="text-center course-heading mt-5">All Courses </h1>

            <div class="super">
                <div class="row">

                    <div class="projects-gallery container m-2">
                        @foreach ($category as $category)
                            <div class="web-course">
                                <h1 class="course_name text-center" style="color:green">{{ $category->name }}</h1>
                               <a href="{{route('sub_course',$category->id)}}"> <img src="{{ asset('storage/uploads/' . $category->image) }}"
                                style="width:100%; height:300px;"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

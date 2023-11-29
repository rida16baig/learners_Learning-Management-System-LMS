@extends('admin.admin_navbar')
@section('title', 'Courses')
<link rel="stylesheet" href="{{ asset('css/show-course.css') }}">
@section('content')

    <div class="super mt-3 " >
        <div class="row">
            <h1 class="text-center offered-courses " style="color:green; text-shadow:1px 1px 2px black"><i>All Courses Offered</i></h1>
            <div class="projects-gallery container ">
                @foreach ($course as $course)
                    <div class="web-course">
                        <h1 class="course_name text-center" style="color: green">{{ $course->name }}</h1>
                        <img src="{{ asset('storage/uploads/' . $course->image) }}" style=""  class="image">
                        <h3 class="course_title mt-2">{{ $course->title }}</h3>
                        <p class="c_heading mt-2" style="font-size: 22px">The complete <em>{{ $course->name }}</em> from zero to hero</p>

                        <p class="course_price float-right" style="font-size: 25px">
                            Buy in <b>{{ $course->price }}</b> only!
                        </p>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

@endsection

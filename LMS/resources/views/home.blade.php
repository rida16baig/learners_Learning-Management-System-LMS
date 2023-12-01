@extends('welcome')
@section('title', 'Welcome to learners')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif

    <body>
        <div class="hero-container">

          <div class="intro_div">
            <div>
                <img src="{{ asset('storage/uploads/img/girl-img.png') }}" alt="header-img" class="girl-img img">
               </div>
               <div>
                <div class="header_text">
                    <h1 class="header_heading mt-2">Learn from <span class="icon_text">learners</span></h1>
                    <p class="header-line">The Gateway to Lifelong Learning</p>
                    <p class="header_slogan">Educate , Empower , Excel</p>
                </div>
               </div>
          </div>

        </div>

        <div class="about" >
            <div class="about_para mt-2">
                <p class="about_heading">Get to Know Us Better!</p>
                <p class="about_text">At <span class="icon_text">Learners</span>, we believe in the transformative power of
                    education. Our mission is to make learning
                    accessible and engaging for everyone, fostering a community of lifelong learners. With a passion for
                    innovation and a commitment to excellence, we've created a platform that bridges the gap between
                    education and the modern world. Our interactive courses, rich in content, and easy-to-use features
                    empower learners to thrive.Join us on this quest for knowledge, growth, and endless possibilities</p>
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
                                <a href="{{ route('sub_course', $category->id) }}"> <img
                                        src="{{ asset('storage/uploads/' . $category->image) }}"
                                        style="width:100%; height:300px;"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection

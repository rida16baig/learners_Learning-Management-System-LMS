@extends('welcome')
@section('title', 'Course Details ')
<link rel="stylesheet" href="{{ asset('css/course.css') }}">

@section('content')

    <div class="hero-container">
        <div class="hero-text">
            <div>
                <h1 style="color:green; text-shadow:1px 1px 3px black "><big><b>{{ $course->name }} Crash Course Beginning to
                            Advance</b></big></h1>
                <p class="c_heading mt-3" style="font-size: 22px">The complete <em>{{ $course->name }}</em> Course from zero
                    to
                    hero</p>
                <div class="mentor">
                    <span>Created by: </span><span><b>John Doe</b></span>
                </div>
                <div class="lang">
                    <span>
                        <img src="{{ asset('storage/uploads/refresh.png') }}" style="width:20px; height:20px">
                        Last Updated 8/2023</span>
                    <span> <img src="{{ asset('storage/uploads/lang.png') }}" style="width:20px; height:20px">
                        English</span>
                    <span> <img src="{{ asset('storage/uploads/subtitle.png') }}" style="width:20px; height:20px"> Subtitles
                        in
                        English</span>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="hero-image">
                <img src="{{ asset('storage/uploads/' . $course->image) }}" class="course-img">
            </div>
        </div>
    </div>
    <div class="body">

        <div class="d-flex">
            <div class=" p-2 mt-5 ">
                <div class=" container card  "
                    style="border:2px solid green; border-radius:10px;box-shadow:2px 2px 10px black">
                    <div class="card-header">
                        <h1 style="color:green; text-shadow:1px 1px 3px black ">
                            <b>{{ $course->title }}</b>
                        </h1>
                    </div>
                    <div class="body-text p-3" style="background-color: rgb(246, 244, 240)">
                    
                    
                        <div class="card-body" style="border-radius: 10px">
                    
                    
                    
                            <h4 class="mt-2" style="font-size: 22px;color:green; text-shadow:1px 1px 1px black ">
                                <big><b><i>Course Description:</i></b></big>
                            </h4>
                    
                            <p class="course-desc " style="font-size: 20px">
                                {{ $course->description }}
                            </p>
                    
                            <h4 class="mt-2" style="font-size: 22px;color:green; text-shadow:1px 1px 1px black">
                                <big><b><i>Course Highlights:</i></b></big>
                            </h4>
                    
                            <p class="course-highlights" style="font-size: 20px">{{ $course->highlights }}</p>
                    
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex-2 flex flex-column p-2 mt-5 ">
                <div class=" container card  "
                    style="border:2px solid green; border-radius:10px;box-shadow:2px 2px 10px black">
                    <div class="m-2 p-2" style="background: white ; border-radius:10px;">
                        <h4 class="mt-2" style="font-size: 22px;color:green; text-shadow:1px 1px 1px black">
                            <big><b><i>Course Price:</i></b></big>
                        </h4>

                        <p class="course-price " style="font-size: 20px">
                            Price of this outstanding course is <b><big>{{ $course->price }}</big></b> only!
                        </p>


                        <h4 class="mt-2" style="font-size: 22px;color:green; text-shadow:1px 1px 1px black">
                            <big><b><i>Course Category:</i></b></big>
                        </h4>

                        <p class="course-price " style="font-size: 20px">
                            Category of this Course is <b><big>{{ $course->category->name }}</big></b>
                        </p>

                    </div>
                </div>
                <div class=" container card mt-3 "
                    style="border:2px solid green; border-radius:10px;box-shadow:2px 2px 10px black">

                    <div class="card-header ">
                        <h3 style="color:green; text-shadow:1px 1px 2px black"><big><b>Student Reviews</b></big>
                        </h3>
                    </div>
                    <div class="card-body" style="font-size: 20px">
                        <ul>
                            @if ($commentWithCourse->isEmpty())
                                <p class="m-2">No comments posted yet!</p>
                            @else
                                @foreach ($commentWithCourse as $comment)
                                    <li><b>User_name :</b> <b>{{ $comment->user->name }}</b>
                                        <p class="m-2"><i>"{{ $comment->comment }}"</i></p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class=" container card mt-3 "
                    style="border:2px solid green; border-radius:10px;box-shadow:2px 2px 10px black">
                    <div class="card-header">
                        <h4 style="color:green; text-shadow:1px 1px 2px black"><big><b>This course
                                    includes:</b></big></h4>
                    </div>
                    <div class="video-enroll  " style="background:white">


                        <div class="card-body">
                            <p><span class="video-enroll-icon"><img src="{{ asset('storage/uploads/video_5948543.png') }}"
                                        alt="img" width="27px" height="27px"></span><span> 54 hours on-demand
                                    video</span></p>
                            <p><span class="video-enroll-icon"><img
                                        src="{{ asset('storage/uploads/document_4782380.png') }}" alt="img"
                                        width="30px" height="30px"></span><span> Assignments</span></p>
                            <p><span class="video-enroll-icon"><img src="{{ asset('storage/uploads/file_1508964.png') }}"
                                        alt="img" width="30px" height="30px"></span><span> 221 articles</span></p>
                            <p><span class="video-enroll-icon"><img
                                        src="{{ asset('storage/uploads/download_2989976.png') }}" alt="img"
                                        width="30px" height="30px"></span><span> 154 downloadable
                                    resources</span></p>
                            <p><span class="video-enroll-icon"><img
                                        src="{{ asset('storage/uploads/smartphone_7344131.png') }}" alt="img"
                                        width="30px" height="30px"></span><span> Access on mobile and
                                    TV</span>
                            </p>
                            <p><span class="video-enroll-icon"><img
                                        src="{{ asset('storage/uploads/infinity_10015261.png') }}" alt="img"
                                        width="30px" height="30px"></span><span> Full lifetime access</span>
                            </p>
                            <p><span class="video-enroll-icon"><img src="{{ asset('storage/uploads/trophy_8657788.png') }}"
                                        alt="img" width="30px" height="30px"></span><span> Certificate of
                                    completion</span></p>

                            @auth
                                <a href="{{ route('buy_course', $course->id) }}" class="btn enroll-btn"
                                    style="width: 100%; height:70px; font-size:35px; background-color:green; color:white;">Buy
                                    Now!</a>
                            @endauth

                            @if (!Auth::user())
                                <a href="{{ route('register') }}" class="btn enroll-btn"
                                    style="width: 100%; height:70px; font-size:35px; background-color:green; color:white;">Enroll
                                    Now!</a>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    </div>


@endsection


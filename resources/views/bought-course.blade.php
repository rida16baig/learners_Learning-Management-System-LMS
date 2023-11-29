@extends('welcome')
@section('title', 'Course Details ')
<link rel="stylesheet" href="{{ asset('css/bought-course.css') }}">

@section('content')

    <div class="hero-container">
        <div class="hero-text">
            <h1 style="color:green; text-shadow:1px 1px 3px black "><big><b>{{ $course->name }} Crash Course Beginning to Advance</b></big></h1>
            <p class="c_heading mt-3" style="font-size: 22px">The complete <em>{{ $course->name }}</em> Course from zero to
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
                <span> <img src="{{ asset('storage/uploads/subtitle.png') }}" style="width:20px; height:20px"> Subtitles in
                    English</span>
            </div>
        </div>
        <div class="d-flex">
            <div class="hero-image">
                <video src="{{ asset('storage/uploads/' . $course->video) }}" style="height: 500px; width:100%;" controls>
            </div>
        </div>
    </div>
    <div class="body">

        <div class="d-flex ">
            <div class="card course-desc  mt-5 container "
                style="border:4px solid green; border-radius:10px;box-shadow:2px 2px 10px black">
                <div class="body-text p-3" style="">

                    <div class="card-header" style="color:green; text-shadow:1px 1px 3px black ">
                        <h1><b>{{ $course->title }}</b></h1>
                    </div>
                    <div class="card-body">

                        <img src="{{ asset('storage/uploads/' . $course->image) }}" class="course-img">


                        <h4 class="mt-2" style="font-size: 22px ;color:green; text-shadow:1px 1px 2px black"><big><b><i>Course Description:</i></b></big></h4>

                        <p class="course-desc " style="font-size: 20px">
                            {{ $course->description }}
                        </p>

                        <h4 class="mt-2" style="font-size: 22px;color:green; text-shadow:1px 1px 2px black"><big><b><i>Course Highlights:</i></b></big></h4>

                        <p class="course-highlights" style="font-size: 20px">{{ $course->highlights }}</p>

                    </div>
                </div>
            </div>

            <div class="flex-2 d-flex course-review flex-column mt-5 m-2">


                <div class="card container mb-3"
                    style=" border:4px solid green; border-radius:10px; ;box-shadow:2px 2px 10px black">

                    <form action="{{ route('comment',  $course->id) }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group m-2 ">
                            <label for="comment">
                                <h4 style="color:green; text-shadow:1px 1px 1px black"><big><b>Your Review:</b></big></h4>
                            </label>
                            <textarea type="text" class="form-control m-2 p-3" cols="30" rows="1" name="comment" id="comment"
                                style="background: transparent; box-shadow:1px 1px 10px black;  "></textarea>
                        </div>
                        <div class="form-group m-2 ">
                            <input type="submit" class="btn btn-success m-2" value="Add Comment" style=" box-shadow:1px 1px 5px black;">
                        </div>
                    </form>


                </div>


                <div class="card container mb-3"
                    style=" border:4px solid green; border-radius:10px;box-shadow:2px 2px 10px black">
                    <div class="card-header">
                        <h3 style="color:green; text-shadow:1px 1px 1px"><big><b>Student Reviews</b></big></h3>
                    </div>
                    <div class="card-body" style="font-size: 20px">
                        <ul>
                            @if ($commentWithCourse->isEmpty())
                                <p class="m-2">No comments posted yet!</p>
                            @else
                                @foreach ($commentWithCourse as $comment)
                                    <li> <b>{{ $comment->user->name }}</b>
                                        <p class="m-2"><i>"{{ $comment->comment }}"</i></p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        

    @endsection

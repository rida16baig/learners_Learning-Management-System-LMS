@extends('welcome')

@section('title', "Student's Dashboard")

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


    <div class="hero-container">
        <div class="hero-container-content ">
            <h1 class="text-center">
                Learn <i><b>{{ $category_name }} </b></i> Courses at <span> learners</span>!
            </h1>
        </div>
        <div class="hero-container-img">
            <img src="{{ asset('storage/uploads/img/comupter.png') }}" class="comp-img" alt="img">
        </div>
    </div>

    <div class="courses">


        <div class="row">

            <h1 class="text-center course-heading mt-5">{{ $category_name }} Courses </h1>
            <div class="projects-gallery container m-2">
                @foreach ($courseWithCat as $courseWithCat)
                    <div class="web-course">
                        <h1 class="course_name text-center" style="color:green">{{ $courseWithCat->name }}</h1>
                        <a href="{{route('detail_courses',$courseWithCat->id)}}">
                            <img src="{{ asset('storage/uploads/' . $courseWithCat->image) }}"
                                style="width:100%; height:300px;">
                        </a>
                        <h3 class="course_title mt-2">{{ $courseWithCat->title }}</h3>
                        <p class="c_heading mt-2" style="font-size: 22px">The complete <em>{{ $courseWithCat->name }}</em>
                            from zero to hero</p>

                        <p class="course_price float-right" style="font-size: 25px">
                            Buy in <b>{{ $courseWithCat->price }}</b> only!
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





@endsection

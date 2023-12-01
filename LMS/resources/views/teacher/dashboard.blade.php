@extends('teacher.teacher-navbar')
@section('title', 'Teachers Dashboard')
<link rel="stylesheet" href="{{ asset('css/admin-dash.css') }}">
@section('content')

    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif

    <div class="flex container mt-5" >

        <h1 class="admin-panel-heading "><i>Welcome to the Teacher Panel!</i></h1>

        <div class="portal-access container ">
            <a href="{{ route('student_dashboard') }}" class="student_portal btn ad_dashboard_btn p-5 m-3"
                >Go to Student's Portal</a>
            <a href="{{ route('all_courses') }}" class="student_portal btn ad_dashboard_btn p-5 m-3"
                >Manage All Courses</a>
                <a href="{{ route('create_course') }}" class="student_portal btn ad_dashboard_btn p-5 m-3"
                    >Add Courses</a>
            <a href="{{ route('all_category') }}" class="student_portal btn ad_dashboard_btn p-5 m-3"
                >Manage All Categories</a>
            <a href="{{ route('create_category') }}" class="student_portal btn ad_dashboard_btn p-5 m-3"
                >Add Categories</a>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

@endsection

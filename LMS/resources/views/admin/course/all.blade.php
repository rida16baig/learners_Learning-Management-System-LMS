@extends('admin.admin_navbar')

@section('title', 'all courses page')


@section('content')
    <div class="continer m-4 mt-5">
        <div class="card-title text-center m-1">
            <h1><u>All Courses</u></h1>
        </div>
        <div class="card">
            <div class="card-body text-center d-flex align-content-center flex-wrap">
                @if (Session::has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Video</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Highlights</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($course as $course)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>
                                    <video class="video-thumbnail" width="100%" controls>
                                        <source src="{{ asset('storage/uploads/' . $course->video) }}" type="video/mp4">
                                        {{-- Your browser does not support the video tag. --}}
                                    </video>
                                </td>
                                <td><img class="img-thumbnail" width="200px"
                                        src="{{ asset('storage/uploads/' . $course->image) }}" alt="{{ $course->title }}">
                                </td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>{{ $course->highlights }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->category->name }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('edit_course', $course->id) }}">EDIT</a>
                                </td>
                                <td>
                                    <form action="{{ route('delete_course', $course->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="DELETE" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

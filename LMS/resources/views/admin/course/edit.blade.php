@extends('admin.admin_navbar')

@section('title', 'edit courses page')

@section('content')
    @if (Session::has('msg'))
        <p class="text-center"> {{ Session::get('msg') }}</p>
    @endif
    <div class="container col-6 mt-5 p-5">
        <h3 class="text-center"><u>Edit Course</u></h3>
        <form action="{{ route('update_course', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3 ">
                <label for="name">Course Name</label>
                <input type="text" name="name" value="{{ old('name', $course->name) }}" class="form-control"
                    id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3 ">
                <label for="title">Course Title</label>
                <input type="text" name="title" value="{{ old('title', $course->title) }}" class="form-control"
                    id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Course Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="highlights">Course Highlights</label>
                <textarea name="highlights" id="highlights" class="form-control" cols="30" rows="10">{{ old('highlights', $course->highlights) }}</textarea>
                @error('highlights')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3 ">
                <label for="price">Course Price</label>
                <input type="text" name="price" value="{{ old('price', $course->price) }}" class="form-control"
                    id="price">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <select class="form-select" name="category_id">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="image">Upload Thumbnail</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <img src="{{ asset('storage/uploads/' . $course->image) }}" class="img-thumbnail">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="video">Upload Video</label>
                <input type="file" name="video" class="form-control" id="video">
                @error('video')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <video class="video-thumbnail" width="100%" controls>
                    <source src="{{ asset('storage/uploads/' . $course->video) }}" type="video/mp4">
                    {{-- Your browser does not support the video tag. --}}
                </video>

            </div>

            <input type="submit" value="Update" class="btn btn-primary mt-3">
        </form>
    </div>
@endsection

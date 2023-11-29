@extends('admin.admin_navbar')


@section('title', 'Create Course Page')


@section('content')

@if (Session::has('msg'))
<p class="text-center">{{ Session::get('msg') }}</p>
@endif
    <div class="container col-6 mt-5">
        <h3 class="card-title text-center">Create Course</h3>
        <form action="{{route('store_course')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group m-3">
                <label for="name">Course Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="title">Course Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="description">Course Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="highlights">Course Highlights</label>
                <textarea name="highlights" id="highlights" cols="30" rows="10" class="form-control">{{ old('highlights') }}</textarea>
                @error('highlights')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="price">Course Price</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}" class="form-control">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="image">Upload Thumbnail</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="video">Upload Video</label>
                <input type="file" name="video" accept="video/*" class="form-control">
                @error('video')
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
            <input type="submit" value="create course" class="btn btn-success m-3">
        </form>
    </div>
@endsection
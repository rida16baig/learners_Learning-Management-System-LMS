@extends('admin.admin_navbar')

@section('title', 'edit category')

@section('content')
    <div class="container col-6 mt-5 card p-3">
        <h3 class="text-center card-header">Edit Category</h3>
        <form action="{{ route('update_category',$category->id) }}" class="card-body" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group mb-3 ">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="image">Upload Thumbnail</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <img src="{{ asset('storage/uploads/' . $category->image) }}" class="img-thumbnail">
            </div>

            <input type="submit" value="Update" class="btn btn-primary mt-1">

        </form>
    </div>
@endsection
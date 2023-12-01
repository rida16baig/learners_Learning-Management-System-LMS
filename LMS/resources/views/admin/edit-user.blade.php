@extends('admin.admin_navbar')

@section('title', 'edit user')

@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif

    <div class="container col-6 mt-5 card p-3  ">
        <h3 class="text-center card-header">Edit Users</h3>
        <form action="{{ route('update_users', $users->id) }}" class="card-body" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="form-group mb-3 ">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $users->name) }}" class="form-control"
                    id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3 ">
                <label for="role">Role</label>
                <input type="text" name="role" value="{{ old('role', $users->role) }}" class="form-control"
                    id="role">
                @error('role')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Update" class="btn btn-primary mt-1">

        </form>
    </div>
@endsection

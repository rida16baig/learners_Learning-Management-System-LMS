@extends('welcome')
@section('title', 'Login')
@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif
    <div class="container mt-5">
        <form action="{{ route('login_user') }}" method="Post" class="mt-5 card p-5">
            @csrf
            @method('post')

            <h1 class="card-title text-center">Login Form</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="m-2 p-2 form-control" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="m-2 p-2 form-control"
                    value="{{ old('password') }}">
                @error('password')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="role form-control" value="{{ old('role') }}">
                    <option default>--Select--</option>
                    <option value="0" id="student">Student</option>
                    <option value="1" id="teacher">Teacher</option>
                    <option value="2" id="admin">Admin</option>
                </select>
                @error('role')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success m-2">
            </div>

        </form>

    </div>




@endsection

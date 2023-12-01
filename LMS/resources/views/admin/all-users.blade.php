@extends('admin.admin_navbar')
@section('title', 'All users')
@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif

    <div class="card container mt-5">
        <div class="card-header"><h1 class="text-center">All Users</h1></div>
        <div class="card-body container">

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->role }}</td>
                            <td><a href="{{ route('edit_users', $users->id) }}" class="btn btn-warning">EDIT</a></td>
                            <td>
                                <form action="{{route('delete_users' , $users->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" value="DELETE" type="submit">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

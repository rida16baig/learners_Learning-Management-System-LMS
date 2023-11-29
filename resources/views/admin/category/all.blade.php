@extends('admin.admin_navbar')

@section('title', 'all categories page')



@section('content')
    <div class="container col-6 mt-5">
        @if (Session::has('msg'))
            <p class="text-success">{{ Session::get('msg') }}</p>
        @endif
        <div class="card">
            <div class="card-header"><h1 class="text-center">All Categories</h1></div>
            <div class="card-body">
                @if (Session::has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($category as $category)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $category->name }}</td>
                                <td><img class="img-thumbnail" width="200px"
                                        src="{{ asset('storage/uploads/' . $category->image) }}" alt="{{ $category->title }}">
                                </td>
                                <td><a href="{{route('edit_category', $category->id)}}" class="btn btn-warning">EDIT</a></td>
                                <td>
                                    <form action="{{route('delete_category', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <input class="btn btn-danger" value="DELETE" type="submit">
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
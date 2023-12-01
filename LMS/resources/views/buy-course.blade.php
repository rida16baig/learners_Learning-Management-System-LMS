@extends('welcome')
@section('title', 'Buy Course')
@section('content')
    @if (Session::has('msg'))
        <p class="text-center">{{ Session::get('msg') }}</p>
    @endif
    <div class="container mt-5 ">
        <form action="{{ route('bought_course',$course_id) }}" method="Post" class=" card p-3">
            @csrf
            @method('post')
            <h1 class="card-header text-center ">Billing Details</h1>
            <div class="form-group card-body p-3 mt-2">
                <label for="f_name" class="mt-2">First Name</label>
                <input type="f_name" name="f_name" id="f_name" class="  form-control" value="{{ old('f_name') }}">
                @error('f_name')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group card-body p-3 mt-2">
                <label for="l_name" class="mt-2">Last Name</label>
                <input type="l_name" name="l_name" id="l_name" class="  form-control" value="{{ old('l_name') }}">
                @error('l_name')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group p-3 mt-2">
                <label for="country">Country</label>
                <select for="country" class="form-control mt-2">
                    <option default>--Select--</option>
                    <option value="us">US</option>
                    <option value="india">India</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="germany">Germany</option>
                </select>
                @error('country')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group p-3 mt-2">
                <label for="state">State</label>
                <select for="state" class="mt-2 form-control">
                    <option default>--Select--</option>
                    <option value="us">US</option>
                    <option value="india">India</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="germany">Germany</option>
                </select>
                @error('state')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group p-3 mt-2">
                <label for="card_number" class="mt-2 form-control">Bank Card Number</label>
                <input type="integer" name="card_number" id="card_number" class="  form-control"
                    value="{{ old('card_number') }}">
                @error('card_number')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
           
            <div class="form-group mt-2">
                <input type="submit" value="Pay Now" class="btn btn-success m-1">
            </div>


        </form>

    </div>




@endsection

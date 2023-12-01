<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function home()
    {
        $course = Course::get();
        $category = Category::get();
        $course = Course::get();

        return view('home', [ 'course' => $course, 'category' => $category ]);
    }

    public function all_users()
    {
        $users = User::all();

        return view('admin.all-users', [ 'users' => $users ]);

    }
    public function edit_users($id)
    {
        $users = User::find($id)->all();
        return view('admin.edit-user', [ 'users' => $users[ 0 ] ]);

    }

    public function update_users(Request $request, $id)
    {

        $request->validate([ 
            'name' => 'required',
            'role' => 'required',
        ]);

        $credentials = $request->only('name', 'role');

        $result = User::where('id', $id)->update($credentials);

        if ($result) {
            return redirect()->route('admin_dashboard')->with('msg', 'User updated successfully!');
        } else {
            return redirect()->back()->with('msg', 'Something went wrong!');
        }

    }

    public function delete_users($id)
    {
        $result = User::where('id', $id)->delete();

        if ($result) {
            return redirect()->route('admin_dashboard')->with('msg', 'User Deleted Successfully!');
        } else {
            return redirect()->back()->with('msg', 'Something Went Wrong!');
        }

    }

    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view("auth.register");
    }
    public function logout()
    {
        Auth::logout();
        $course = Course::all();
        return redirect()->route('home');

    }


    public function register_user(Request $request)
    {
        $request->validate([ 
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'role' => 'required'
        ]);

        $user = User::insert([ 
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);


        if ($user) {

            if ($request->role == 0) {
                return redirect()->route('student_dashboard');
            } elseif ($request->role == 1) {
                return redirect()->route('teacher_dashboard');
            } elseif ($request->role == 2) {
                return redirect()->route('admin_dashboard');
            }

        } else {
            return redirect()->route('home')->with('msg', 'something went wrong!');
        }
    }


    public function login_user(Request $request)
    {
        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        $credentials = $request->only('email', 'password', 'role');

        if (Auth::attempt($credentials, true)) {

            if (auth()->check()) {
                // Check if the user is authenticated

                $user = auth()->user();

                // Get the authenticated user

                if ($user->role == 0) {
                    return redirect()->route('student_dashboard');
                } elseif ($user->role == 1) {
                    return redirect()->route('teacher_dashboard');
                } elseif ($user->role == 2) {
                    return redirect()->route('admin_dashboard');
                }
            }
        }

        return redirect()->back()->with('msg', 'Invalid credentials');
    }



    public function teacher_dashboard()
    {


        return view("teacher.dashboard");
    }
    public function admin_dashboard()
    {
        $course = Course::all();
        return view("admin.dashboard", [ 'course' => $course ]);
    }

}

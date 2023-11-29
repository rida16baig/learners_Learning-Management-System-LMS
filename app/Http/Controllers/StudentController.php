<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class StudentController extends Controller
{
    public function student_dashboard()
    {

        $course = Course::all();
        $user = User::all();  
        $category = Category::all();  

        return view("student.dashboard",['course'=>$course,'users'=>$user[0],'category'=>$category]);
    }
}

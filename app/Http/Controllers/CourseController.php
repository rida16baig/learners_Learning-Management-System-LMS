<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function create_course()
    {

        return view('admin.course.create', [ 'categories' => Category::all()]);
    }


    public function store_course(Request $request)
    {
        $request->validate([ 
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'highlights' => 'required',
            'video' => 'required|mimes:mp4|max:10240',
            'image' => 'required|mimes:png,jpeg,jpg,webp|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        $video = $request->file('video');
        $image = $request->file('image');

        if (!$video) {
            return redirect()->back()->with('msg', 'Image not provided');
        }

        $video_name = $video->getClientOriginalName();
        $video->storeAs('public/uploads', $video_name);

        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/uploads', $image_name);

        $result = Course::create([ 
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'highlights' => $request->input('highlights'),
            'video' => $video_name,
            'image' => $image_name,
            'category_id' => $request->input('category_id'),
        ]);



        if ($result) {
            return redirect()->back()->with('msg', 'Course Added Successfully');
        }
    }
    public function all_courses()
    {
        $course = Course::all();
        return view('admin.course.all', [ 'course' => $course ]);
    }


    public function delete_course($id)
    {
        $result = Course::where('id', $id)->delete();

        if ($result) {
            return redirect()->back()->with('msg', 'Blog Deleted Successfully');
        }
    }

    public function show_courses()
    {
        $course = Course::all();
        return view('admin.course.show', [ 'course' => $course ]);
    }

    public function edit_course($id)
    {
        $course = Course::find($id);
        return view('admin.course.edit', [ 'course' => $course, 'categories' => Category::all()]);
    }

    public function update_course(Request $request, $id)
    {
        $video = Course::where('id', $id)->select('video')->get();

        $video = $video[ 0 ]->video;

        $image = Course::where('id', $id)->select('image')->get();

        $image = $image[ 0 ]->image;
        $validated_data = $request->validate([ 
            'title' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'highlights' => 'required',
            'category_id' => 'required|exists:categories,id',
            // Add this rule to check if the category exists
        ]);

        $newVideo = $request->file('video');
        $newImg = $request->file('image');

        if ($newVideo) {

            $result = Storage::delete('public/' . $video);

            if ($result) {

                $video_name = $newVideo->getClientOriginalName();
                $newVideo->storeAs('public/uploads', $video_name);

                $result = Course::where('id', $id)->update([ 
                    'title' => $request->input('title'),
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'highlights' => $request->input('highlights'),
                    'category_id' => $request->input('category_id'),
                    'video' => $video_name,
                ]);

                if ($result) {
                    return redirect()->back()->with('msg', 'course updated successfully');
                }
            }
        } else {
            $result = Course::where('id', $id)->update($validated_data);
            if ($result) {
                return redirect()->back()->with('msg', 'course updated successfully');
            }
        }



        if ($newImg) {
            $result = Storage::delete('public/' . $image);

            if ($result) {

                $image_name = $newImg->getClientOriginalName();
                $newImg->storeAs('public/uploads', $image_name);

                $result = Course::where('id', $id)->update([ 
                    'title' => $request->input('title'),
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'highlights' => $request->input('highlights'),
                    'category_id' => $request->input('category_id'),
                    'image' => $image_name,
                ]);

                if ($result) {
                    return redirect()->back()->with('msg', 'course updated successfully');
                }
            }
        } else {
            $result = Course::where('id', $id)->update($validated_data);
            if ($result) {
                return redirect()->back()->with('msg', 'course updated successfully');
            }
        }
    }
    public function sub_course($id)
    {
        $user = User::all();
        $courseWithCat = Course::with('category')->where('category_id', $id)->get();

        $category_name = $courseWithCat[ 0 ]->category->name;

        return view('course.sub-course', [ 'courseWithCat' => $courseWithCat, 'user' => $user[ 0 ], 'category_name' => $category_name ]);
    }

    public function detail_courses($id)
    {
        // Get the latest 10 comments related to the course with the given ID
        $commentWithCourse = Comment::with('course')
            ->where('course_id', $id)->latest()->take(10)->get();

        $course = Course::where('id', $id)->get();
        return view('course.courses-detail', [ 'course' => $course[ 0 ],'commentWithCourse' => $commentWithCourse  ]);
    }


    public function buy_course($id)
    {
        $course_id = Course::where('id', $id)->get();
        return view('buy-course', [ 'course_id' => $course_id[ 0 ]->id ]);
    }


    public function bought_course(Request $request, $course_id)
    {
        $result = $request->validate([ 
            'f_name' => 'required',
            'l_name' => 'required',
            'card_number' => 'required|integer'
        ]);


        // Get the latest 10 comments related to the course with the given ID
        $commentWithCourse = Comment::with('course')
            ->where('course_id', $course_id)->latest()->take(10)->get();

        $course = Course::where('id', $course_id)->get();


        if ($result) {
            return view('bought-course', [ 'course' => $course[ 0 ], 'commentWithCourse' => $commentWithCourse ]);
        }


    }


}

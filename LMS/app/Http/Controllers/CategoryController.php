<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function create()
    {
        return view("admin.category.create");
    }

    public function store_category(Request $request)
    {
         $request->validate([ 
            'name' => 'required|unique:categories',
            'image' => 'required'
        ]);


        $image = $request->file('image');

        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/uploads', $image_name);


        $result = Category::create([ 

            'name' => $request->input('name'),
            'image' => $image_name,
        ]);

        if ($result) {
            return redirect()->back()->with('msg', 'Category Added Successfully');
        } else {
            return redirect('/')->with('msg', 'Something went wrong');
        }
    }

    public function all_category()
    {
        $result = category::get();

        return view('admin.category.all', [ 'category' => $result ]);
    }

    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', [ 'category' => $category ]);
    }
    public function update_category(Request $request, $id)
    {
        $validatedData = $request->validate([ 
            'name' => 'required',
            'image' => 'required'
        ]);

        $image = Category::where('id', $id)->select('image')->get();

        $image = $image[ 0 ]->image;


        $newImg = $request->file('image');

        if($newImg){
            $result = Storage::delete('public/' . $image);

            if ($result) {

                $image_name = $newImg->getClientOriginalName();
                $newImg->storeAs('public/uploads', $image_name);

                $result = Category::where('id', $id)->update([ 
                    'name' => $request->input('name'),
                    'image' => $image_name,
                ]);

                if ($result) {
                    return redirect()->route('all_category')->with('msg', 'course updated successfully');
                }
            }
        }
        else {
            $result = Category::where('id', $id)->update($validatedData);
            if ($result) {
                return redirect()->back()->with('msg', 'course updated successfully');
            }
        }

    }
    public function delete_category($id)
    {
        $result = category::destroy($id);
        if ($result) {
            return redirect()->back()->with('msg', 'Category Deleted Successfully');
        } else {
            return redirect()->back()->with('msg', 'Something Went Wrong');
        }
    }
}

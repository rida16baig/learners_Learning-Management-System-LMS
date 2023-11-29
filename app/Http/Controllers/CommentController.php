<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show_comment()
    {

        $user = User::all();
        $commentWithUser = Comment::with('user')->get();

        // $commentWithUser = $commentWithUser[0]->comment;

        return view('bought-course', [ 'commentWithUser' => $commentWithUser, 'user' => $user[ 0 ] ]);
    }
  
    public function comment(Request $request, $id)
    {
        $request->validate([ 
            'comment' => 'required',

        ]);

    
        $store_comment = Comment::create([ 
            'comment' => $request->input('comment'),
            'course_id' => $id,
            'user_id' => Auth::user()->id,
        ]);
    
        if ($store_comment) {
            return redirect()->route('buy_course', ['id' => $id])->with('msg', 'Comment added successfully!');

        }
    }
    
    
}

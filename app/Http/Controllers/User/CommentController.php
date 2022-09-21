<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
use App\Models\User\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "comment" => "required",
            "user_id" => "required",
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->save();

        $user_comment = new UserComment();
        $user_comment->comment_id = $comment->id;
        $user_comment->create_user_id = Auth::user()->id;
        $user_comment->user_id = $request->user_id;
        $user_comment->save();

        return redirect()->route('profile_show', ['id' => $request->user_id]);
    }
}

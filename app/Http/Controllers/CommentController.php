<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Comment;

class CommentController extends Controller
{
    function submit(User $user_id, Game $game_id){
        $validated = request()->validate(["comment" => "required|min:8|max:255"]);
        $comment = Comment::create([
            'user_id' => $user_id->id,
            'game_id' => $game_id->id,
            'comment' =>$validated["comment"]
        ]);
        return redirect()->back();
    }
}

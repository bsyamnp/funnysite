<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $validated= $request->validate([
            'content'=>'required',
            'shop_id'=>'required|numeric|exists:shops,id',
        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('habar','comments is created');
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back()->with('habar','comment is delete');
    }


}

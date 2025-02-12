<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
   /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        return Comment::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        return Comment::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        
        return $comment->delete();
    }
}

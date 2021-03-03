<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        if(!request()->ajax()) {
            abort(403);
        }
    }

    public function store()
    {

    }

    public function destroy()
    {

    }

    /**
     * Get the comments for the specified post.
     *
     * @param  \App\Models\Post  $post
     * @param  integer $page
     * @return array
     */
    public function comments(Post $post)
    {
        $comments = $post->validComments()
            ->withDepth()
            ->latest()
            ->get()
            ->toTree();

        return [
            'html' => view('front/comments', compact('comments'))->render(),
        ];
    }
}

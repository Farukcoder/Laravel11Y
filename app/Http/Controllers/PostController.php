<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$students = Post::with('student')->get();
        //
        //return $students;

        // $posts = Post::with('image')->get();

        $post = Post::with('tags')->get();

        return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = [
            [
                'student_id' => 2,
                'title' => "This is title 1",
                'description' => "This is description 1",
            ],
            [
                'student_id' => 2,
                'title' => "This is title 2",
                'description' => "This is description 2",
            ],
            [
                'student_id' => 1,
                'title' => "This is title 3",
                'description' => "This is description 3",
            ],
            [
                'student_id' => 1,
                'title' => "This is title 4",
                'description' => "This is description 4",
            ],
        ];


        $images = [
            ['url' => 'images/post/post-one.jpg'],
            ['url' => 'images/post/post-two.jpg'],
            ['url' => 'images/post/post-three.jpg'],
            ['url' => 'images/post/post-four.jpg'],
        ];

        $comments = [
            ['detail' => "This is student 1 comment"],
            ['detail' => "This is student 2 comment"],
            ['detail' => "This is student 3 comment"],
            ['detail' => "This is student 4 comment"],
        ];

        $tags = [
            [
                'tag_name' => 'Bollywood'
            ],
            [
                'tag_name' => 'Hollywood'
            ],
            [
                'tag_name' => 'Salman Khan'
            ],
            [
                'tag_name' => 'Dipika'
            ],
        ];



        collect($posts)->each(function ($post, $index) use ($images, $comments, $tags) {
            $createPost = Post::create($post);
            $createPost->image()->create($images[$index]);
            $createPost->comments()->create($comments[$index]);
            $createPost->tags()->create($tags[$index]);
        });

        // $posts = Post::find(1);
        //
        // $posts->tags()->attach([1, 2, 3]);

    }

    public function postWithComment()
    {
        $posts =  Post::with('comments')->get();

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

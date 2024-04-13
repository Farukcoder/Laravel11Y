<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $videos = Video::with('comments')->get();
        //
        // $videos = Video::with('latestComment')->get();
        // $videos = Video::with('oldestComment')->get();

        // $videos = Video::with('bestComment')->get();
        // $videos = Video::with('leastComment')->get();

        $video = Video::with('tags')->get();
        return $video;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videos = [
            ['title' => 'title video1', 'url' => 'images/video1.mp4'],
            ['title' => 'title video2', 'url' => 'images/video2.mp4'],
            ['title' => 'title video3', 'url' => 'images/video3.mp4'],
            ['title' => 'title video4', 'url' => 'images/video4.mp4']
        ];

        $comments = [
            ['detail' => 'This is video 1 comment'],
            ['detail' => 'This is video 2 comment'],
            ['detail' => 'This is video 3 comment'],
            ['detail' => 'This is video 4 comment']
        ];

        foreach ($videos as $index => $videoData) {
            $video = Video::create($videoData);
            $video->comments()->create($comments[$index]);

        }

        // $video = Video::find(1);

        // $video->tags()->attach([1,2]);
        // $video->tags()->sync([1,2]);
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

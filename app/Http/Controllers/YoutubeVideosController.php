<?php

namespace App\Http\Controllers;

use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class YoutubeVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = YoutubeVideo::all();
        return view('admin.youtubevideo.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.youtubevideo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'link' => 'required',
            'videoid' => 'required',
        ];


        $this->validate($request, $rules);

        $image = getimagesize("https://i.ytimg.com/vi/$request->videoid/maxresdefault.jpg");

        if (is_array($image)) {
            $finalImage = "https://i.ytimg.com/vi/$request->videoid/maxresdefault.jpg";
        } else {
            $finalImage = "https://i.ytimg.com/vi/$request->videoid/hqdefault.jpg";
        }
        $video = [
            'name' => $request->name,
            'link' => $request->link,
            'video_id' => $request->videoid,
            'video_img' => $finalImage

        ];

        YoutubeVideo::insert($video);
        return back()->with('success', 'Video Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\NewsPapers;
use App\Models\YoutubeNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function blogNewsIndex()
    {
        $blogNews = Blogs::orderBy('id', 'DESC')->get();
        return view('admin.news.blog_news_index', compact('blogNews'));
    }

    public function blogNewsCreate()
    {
        return view('admin.news.blog_news_create');
    }

    public function blogNewsEdit($id)
    {

        $blogNews = Blogs::where('id', $id)->first();
        return view('admin.news.blog_news_edit', compact('blogNews'));
    }

    public function blogNewsUpdate(Request $request, $id)
    {

        $rules = [
            'title'             => 'required',
            'image'             => 'image|mimes:jpeg,png,jpg|max:2048',
            'description'       => 'required',
            'status'            => 'required|numeric|max:1'

        ];

        

        $this->validate($request, $rules);

        

        if ($request->file('image') != null) {

            $files = $request->file('image');
            $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageExtension;
            $files->move(public_path('/uploads/news'), $imageName);

            $blogNews = Blogs::where('id', $id)->first();
            unlink(public_path('/uploads/news/' . $blogNews['image']));

            $data = [
                'title'         => $request->title,
                'description'   => $request->description,
                'image'         => $imageName,
                'status'        => $request->status   
            ];
        } else {
            $data = [
                'title'         => $request->title,
                'description'   => $request->description,
                'status'        => $request->status   
            ];
        }
        Blogs::where('id', $id)->update($data);
        return back()->with('success', 'Blog News Updated');
    }

    public function blogNewsStore(Request $request)
    {
        $rules = [
            'title'          => 'required',
            'image'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'    => 'required',
            'status'         => 'required|numeric|max:1'

        ];

        $this->validate($request, $rules);
        

        $thumbnail = $request->file('image');
        $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $blogNewsData = [
            'title'             => $request->title,
            'image'             => $imageName,
            'description'       => $request->description,
            'status'            => $request->status,            
            'posted_by'         => 'admin'
        ];

        Blogs::insert($blogNewsData);
        $thumbnail->move(public_path('/uploads/news'), $imageName);
        return back()->with('success', 'Blog News Uploaded');
    }

    public function blogNewsDestroy($id)
    {
        $blogNews = Blogs::find($id);

        unlink(public_path('/uploads/news/' . $blogNews->image));
        $blogNews->delete();
        return back()->with('success', 'Blog Delete Successfully');
    }



    public function blogNewsDetail($id)
    {
        $blogNews = Blogs::where('blogs.id',$id)
                            ->leftJoin('public_users', 'blogs.posted_by', '=', 'public_users.id')
                            ->select('blogs.*', 'public_users.name', 'public_users.email', 'public_users.mobile')
                            ->first();
        
        $allBlogs = Blogs::where('status', 1)->OrderBy('id','DESC')->limit(5)->get();
        
        return view('frontend.blog_detail',compact('blogNews','allBlogs'));
    }


    public function youtubeNewsIndex()
    {
        $youtubeNews = YoutubeNews::orderBy('id', 'DESC')->get();
        return view('admin.news.youtube_news_index', compact('youtubeNews'));
    }

    public function youtubeNewsCreate()
    {
        return view('admin.news.youtube_news_create');
    }

    public function youtubeNewsStore(Request $request)
    {
        $rules = [
            'title'         => 'required',
            'video_link'    => 'required',

        ];

        $this->validate($request, $rules);

        $link = $request->video_link;

        $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
        if (empty($video_id[1]))
            $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

        $video_id = explode("&", $video_id[1]); // Deleting any other params
        $video_id = $video_id[0];

        $youtubeThumbnail = "https://img.youtube.com/vi/$video_id/0.jpg";

        $youtubeNews = [
            'title'             => $request->title,
            'video_link'        => $video_id,
            'video_image'       => $youtubeThumbnail,
        ];

        YoutubeNews::insert($youtubeNews);
        return back()->with('success', 'Youtube News Added Successfully');
    }

    public function youtubeNewsUpdate(Request $request, $id)
    {
        $rules = [
            'title'         => 'required',
            'video_link'    => 'required',

        ];

        $this->validate($request, $rules);

        $link = $request->video_link;

        $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
        if (empty($video_id[1]))
            $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

        $video_id = explode("&", $video_id[1]); // Deleting any other params
        $video_id = $video_id[0];

        $youtubeThumbnail = "https://img.youtube.com/vi/$video_id/0.jpg";

        $youtubeNews = [
            'title'             => $request->title,
            'video_link'        => $video_id,
            'video_image'       => $youtubeThumbnail,
        ];

        YoutubeNews::where('id', $id)->update($youtubeNews);
        return back()->with('success', 'Youtube News Updated Successfully');
    }

    public function youtubeNewsDestroy($id)
    {
        $blogNews = YoutubeNews::find($id);

        $blogNews->delete();
        return back()->with('success', 'Youtube News Delete Successfully');
    }

    public function printMediaIndex()
    {
        $printMedia = NewsPapers::orderBy('id', 'DESC')->get();

        return view('admin.news.print_media_index', compact('printMedia'));
    }

    public function printMediaCreate()
    {
        return view('admin.news.print_media_create');
    }

    public function printMediaStore(Request $request)
    {
        $rules = [
            'image'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $thumbnail = $request->file('image');
        $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $printMediaData = [
            'image'          => $imageName,

        ];

        NewsPapers::insert($printMediaData);
        $thumbnail->move(public_path('/uploads/news'), $imageName);
        return back()->with('success', 'News Uploaded');
    }

    public function printMediaDestroy($id)
    {

        $printMedia = NewsPapers::find($id);

        unlink(public_path('/uploads/news/' . $printMedia->image));
        $printMedia->delete();
        return back()->with('success', 'News Deleted Successfully');

    }
}

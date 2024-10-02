<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'bimg' => 'image|mimes:jpeg,jpg,png|max:2048'
        ];


        $this->validate($request, $rules);
        $files = $request->file('bimg');
        $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $banner = [
            'bimages' => $imageName
        ];

        Banner::insert($banner);
        $files->move(public_path('/uploads/banner'), $imageName);
        return back()->with('success', 'Banner Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $rules = [
            'bimg' => 'image|mimes:jpeg,jpg,png|max:2048'
        ];

        $customMessage = [
            'bimg.mimes' => 'Image Must Be File Type jpg,png,jpg'
        ];
        $this->validate($request, $rules, $customMessage);

        $files = $request->file('bimg');
        $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;
        $files->move(public_path('/uploads/banner'), $imageName);

        unlink(public_path('/uploads/banner/' . $banner['bimages']));

        $data = [
            'bimages' => $imageName
        ];

        $banner->update($data);
        return back()->with('success', 'Banner Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {

        unlink(public_path('/uploads/banner/' . $banner['bimages']));
        $banner->delete();
        return back()->with('success', 'Banner Deleted');
    }
}

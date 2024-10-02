<?php

namespace App\Http\Controllers;

use App\Models\AddImageInGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'title'     => 'required|string',
            'date'      => 'required|string',
            'address'   => 'required|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $image = $request->file('image');
        $imageOrignalName  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $gallery = [
            'title'         => $request->title,
            'date'          => $request->date,
            'address'       => $request->address,
            'image'         => $imageName,

        ];

        Gallery::insert($gallery);
        $image->move(public_path('/uploads/gallery'), $imageName);
        return back()->with('success', 'Gallery Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'title'     => 'required|string',
            'date'      => 'required|string',
            'address'   => 'required|string',
            'image'     => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName  = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/gallery'), $imageName);

            unlink(public_path('/uploads/gallery/' . $gallery->image));

            $galleryData = [
                'title'         => $request->title,
                'date'          => $request->date,
                'address'       => $request->address,
                'image'         => $imageName,

            ];
        } else {
            $galleryData = [
                'title'         => $request->title,
                'date'          => $request->date,
                'address'       => $request->address,

            ];
        }

        $gallery->update($galleryData);

        return back()->with('success', 'Gallery Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {

        unlink(public_path('/uploads/gallery/' . $gallery->image));
        $gallery->delete();
        return back()->with('success', 'Gallery Deleted Successfully');
    }
    public function addImageInGalleryIndex()
    {
        $galleryImages = AddImageInGallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.index_add_images', compact('galleryImages'));
    }
    public function addImageInGalleryForm()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.create_add_images', compact('galleries'));
    }

    public function addImageInGallery(Request $request)
    {
        $rules = [
            'gallery_category'  => 'required',
            'image.*'           => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $imageOrignalName  = strtolower(trim($file->getclientoriginalextension()));
                $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;


                $gallryData = [
                    'gallery_id'    => $request->gallery_category,
                    'image'         => $imageName
                ];
                $file->move(public_path('/uploads/gallery/gallery_images'), $imageName);
                AddImageInGallery::insert($gallryData);
            }
            return back()->with('success', 'Image Uploaded Successfully');
        }
    }

    public function deleteGalleryImage($id)
    {
        $gallery = AddImageInGallery::where('id', $id)->first();

        unlink(public_path('/uploads/gallery/gallery_images/' . $gallery->image));
        $gallery->delete();

        return back()->with('success', 'Image Deleted Successfully');
    }
}

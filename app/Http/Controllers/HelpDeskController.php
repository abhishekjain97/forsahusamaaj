<?php

namespace App\Http\Controllers;

use App\Models\HelpDesk;
use App\Models\HelpDeskCategory;
use Illuminate\Http\Request;

class HelpDeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helpDesk = HelpDesk::all();
        return view('admin.helpdesk.index', compact('helpDesk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $helpDeskCategories = HelpDeskCategory::where(['parent_id' => null, 'status' => 1])->get();
        return view('admin.helpdesk.create', compact('helpDeskCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function uploadImage(Request $request)
    {

        $files = $request->file('upload');
        $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('uploads/helpdesk/' . $imageName);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;

        $request->upload->move(public_path('uploads/helpdesk'),  $imageName);

        // if($request->hasFile('upload')){
        //     $request->upload->move(public_path('uploads/banner'), $request->file('upload')->getClientOriginalExtension());

        //     echo  json_encode(array('file_name' => $request->file('upload')->getClientOriginalExtension()));
        // }


    }
    public function store(Request $request)
    {
        $rules = [
            'category'      => 'required',
            'plan'          => 'required|unique:help_desks',
            'title'         => 'required',
            'description'   => 'required',
            'image.*'       => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
        $customeMessage = [
            'plan.unique'          => 'You Already Add Plan'
        ];
        $this->validate($request, $rules, $customeMessage);
        // $imgArr = [];
        if ($request->file('images') != null) {

            $files = $request->file('images');
            foreach ($files as $file) {
                $imageOrignalName  = strtolower(trim($file->getclientoriginalextension()));
                $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
                $imgArr[] = $imageName;
                $file->move(public_path('/uploads/helpdesk'), $imageName);
            }
            $imgStr = implode(",", $imgArr);
        } else {
            $imgStr = null;
        }
        $helpDeskData = [
            'category'       => $request->category,
            'plan'           => $request->plan,
            'title'          => $request->title,
            'description'    => $request->description,
            'images'         => $imgStr,
        ];

        HelpDesk::insert($helpDeskData);
        return back()->with('success', 'Help Desk Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HelpDesk  $helpDesk
     * @return \Illuminate\Http\Response
     */
    public function show(HelpDesk $helpDesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpDesk  $helpDesk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $helpDeskCategories = HelpDeskCategory::where(['parent_id' => null, 'status' => 1])->get();
        $helpdesk = HelpDesk::where('id', $id)->first();
        return view('admin.helpdesk.edit', compact('helpDeskCategories', 'helpdesk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpDesk  $helpDesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $helpdesk = HelpDesk::where('id', $id)->first();
        $rules = [
            'category'      => 'required',
            'plan'          => 'required|unique:help_desks,plan,' . $helpdesk['id'],
            'title'         => 'required',
            'description'   => 'required',

        ];
        $customeMessage = [
            'plan.unique'          => 'You Already Add Plan'
        ];
        $this->validate($request, $rules, $customeMessage);

        $updateHelpdesk = [ 
            "category"      => $request->category,
            "plan"          => $request->plan,
            "title"         => $request->title,
            "description"   => $request->description,
        ];

        HelpDesk::where('id', $id)->update($updateHelpdesk);

        return back()->with('success','HelpDesk Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpDesk  $helpDesk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HelpDesk::where('id', $id)->delete();
        return back()->with('success', 'Help Desk has been successfully deleted.');
    }



    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}

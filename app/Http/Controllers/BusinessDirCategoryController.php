<?php

namespace App\Http\Controllers;

use App\Models\BusinessDirCategory;
use Illuminate\Http\Request;

class BusinessDirCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        return view('admin.businessdirectory.index', compact('businessDirCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.businessdirectory.create');
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
            'category_name' => 'required|unique:business_dir_categories',
        ];


        $this->validate($request, $rules);

        $data = [
            'category_name' => $request->category_name,
        ];

        BusinessDirCategory::insert($data);
        return back()->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessDirCategory  $businessDirCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDirCategory $businessDirCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessDirCategory  $businessDirCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessDirCategory $businessDirCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessDirCategory  $businessDirCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $businessCat = BusinessDirCategory::where('id', $id)->first();
        


        $rules = [
            'category_name' => 'required|unique:business_dir_categories,category_name,' . $businessCat['id'],
        ];


        $this->validate($request, $rules);

        $data = [
            'category_name' => $request->category_name,
        ];

        BusinessDirCategory::where('id', $id)->update($data);
        return back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessDirCategory  $businessDirCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusinessDirCategory::where('id', $id)->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }

    public function callAction($method, $parameters)

    {

        return parent::callAction($method, array_values($parameters));
    }
}

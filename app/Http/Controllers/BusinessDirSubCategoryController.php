<?php

namespace App\Http\Controllers;

use App\Models\BusinessDirCategory;
use App\Models\BusinessDirSubCategory;
use Illuminate\Http\Request;

class BusinessDirSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        $businessDirSubCategories = BusinessDirSubCategory::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.businessdirectorysubcategory.index', compact('businessDirCategories', 'businessDirSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        return view('admin.businessdirectorysubcategory.create', compact('businessDirCategories'));
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
            'category_id' => 'required',
            'sub_category_name' => 'required|unique:business_dir_sub_categories',
        ];


        $this->validate($request, $rules);

        $data = [
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
        ];

        BusinessDirSubCategory::insert($data);
        return back()->with('success', 'Sub Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessDirSubCategory  $businessDirSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDirSubCategory $businessDirSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessDirSubCategory  $businessDirSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessDirSubCategory $businessDirSubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessDirSubCategory  $businessDirSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $businessCat = BusinessDirSubCategory::where('id', $id)->first();
        


        $rules = [
            'category_id' => 'required',
            'sub_category_name' => 'required|unique:business_dir_sub_categories,sub_category_name,' . $businessCat['id'],
        ];


        $this->validate($request, $rules);

        $data = [
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
        ];

        BusinessDirSubCategory::where('id', $id)->update($data);
        return back()->with('success', 'Sub Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessDirSubCategory  $businessDirSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusinessDirSubCategory::where('id', $id)->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }

    public function callAction($method, $parameters)

    {

        return parent::callAction($method, array_values($parameters));
    }
}

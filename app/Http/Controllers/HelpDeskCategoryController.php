<?php

namespace App\Http\Controllers;

use App\Models\HelpDeskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HelpDeskCategoryController extends Controller
{
    public function index()
    {
        $categories = HelpDeskCategory::where('parent_id', '=', null)->with('childrenCategories')
            ->get();
        // $subCategories = 
        // dd($categories);
        return view('admin.helpdeskcategory.index', compact('categories'));
    }

    public function showSubCategory($id)
    {
        $subCategories = HelpDeskCategory::where('parent_id', '=', $id)->get();
        $categoryName = HelpDeskCategory::where('id', '=', $id)->first();
        // dd($categoryName->name);

        return view('admin.helpdeskcategory.all-sub-category', compact('subCategories', 'categoryName'));
    }

    public function addSubCategoryForm($id)
    {
        $category = HelpDeskCategory::where('id', $id)->first();
        return view('admin.helpdeskcategory.add_sub_category', compact('category'));
    }
    public function addSubCategory(Request $request)
    {
        
        $slug = Str::slug($request->sub_category_name, '-');
        $subCat = [
            'parent_id' => $request->catId,
            'name' => $request->sub_category_name,
            'url' => $slug,
            'status' => 1
        ];
        

        HelpDeskCategory::insert($subCat);
        return back()->with('success', 'Sub Category have been successfully saved.');
    }

    public function allSubSubCategory($id)
    {
        $subSubCategories = HelpDeskCategory::where('parent_id', $id)->get();
        $subCat = HelpDeskCategory::where('id', $id)->first();

        return view('admin.helpdeskcategory.all_sub_sub_category', compact('subSubCategories', 'subCat'));
    }

    public function addSubSubCategoryForm($id)
    {
        $subCategory = HelpDeskCategory::where('id', $id)->first();

        return view('admin.helpdeskcategory.add_sub_sub_category', compact('subCategory'));
    }
    public function addSubSubCategory(Request $request)
    {
        $slug = Str::slug($request->sub_category_name, '-');
        $subSubCat = [
            'parent_id' => $request->subcatId,
            'name' => $request->sub_sub_category_name,
            'url' => $slug,
            'status' => 1
        ];

        HelpDeskCategory::insert($subSubCat);
        return back()->with('success', 'Sub-Sub Category have been successfully saved.');
    }

    public function getSubSubMenu(Request $request)
    {

        $data['subsubmenu'] = HelpDeskCategory::where('parent_id', $request->sub_menu_id)->get();

        return response()->json($data);;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.helpdeskcategory.create');
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
            'category_name' => 'required|unique:categories,name',

        ];
        $customMessage = [
            'category_name.required' => 'Category Name Is Required.',
            'category_name.unique' => 'Category Name Exist.',

        ];

        $this->validate($request, $rules, $customMessage);
        $slug = Str::slug($request->category_name, '-');
        $category = [
            'name' => $request->category_name,
            'url' => $slug
        ];

        HelpDeskCategory::insert($category);
        return back()->with('success', 'Category Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(HelpDeskCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpDeskCategory $category)
    {
    }


    public function update(Request $request, $id)
    {


        $rules = [
            'category_name' => 'required',
        ];
        $customMessage = [
            'category_name.required' => 'Category Name Is Required.'

        ];

        $this->validate($request, $rules, $customMessage);

        $updateData = ['name' => $request->category_name, 'status' => $request->status];
        HelpDeskCategory::where('id',$id)->update($updateData);

        return back()->with('success', 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HelpDeskCategory::where('id', $id)->delete();


        return back()->with('success', 'Category Deleted');
    }

    public function indexSubCategory()
    {
        // $subCategories = HelpDeskCategory::where('parent_id' , '!=' , 0)->get();

        // return view('admin.category.all_sub_category',compact('subCategories'));

        $subCategories = HelpDeskCategory::where('parent_id', '!=', null)->with('childrenCategories')
            ->get();
        // dd($subCategories);
        return view('admin.helpdeskcategory.all_sub_category', compact('subCategories'));
        // return view('categories', compact('categories'));
        // return view('categories', compact('categories'));
    }
    public function subCateFrom()
    {
        $categories = HelpDeskCategory::where('parent_id')->get();
        return view('admin.helpdeskcategory.create_sub_category', compact('categories'));
    }

    public function storeSubCategory(Request $request)
    {
        $rules = [
            'sub_category_name' => 'required|unique:categories,name',
            'url' => 'required|unique:categories',
        ];
        $customMessage = [
            'sub_category_name.required' => 'Sub Category Name Is Required.',
            'sub_category_name.unique' => 'Sub Category Name Exist.',
            'url.required' => 'Url Name Is Required.',
            'url.unique' => 'Url Name Is Exist.'
        ];

        $this->validate($request, $rules, $customMessage);

        $subCategory = [
            'parent_id' => $request->category_name,
            'name' => $request->sub_category_name,
            'url' => $request->url

        ];
        HelpDeskCategory::insert($subCategory);
        return back()->with('success', 'SUb Category Add');
    }


    public function subSubCategoryForm()
    {
        $subCategories = HelpDeskCategory::where('parent_id', '!=', null)->with('childrenCategories')
            ->get();
        return view('admin.helpdeskcategory.create_sub_sub_category', compact('subCategories'));
    }

    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}

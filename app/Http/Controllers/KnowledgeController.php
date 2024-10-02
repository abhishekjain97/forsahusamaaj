<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledges = Knowledge::orderBy('id', 'DESC')->with('subSubCat')->get();
        return view('admin.knowledge.index', compact('knowledges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries = DB::table('countries')->get();
        $subCats = Category::where('parent_id', 1)->get();


        return view('admin.knowledge.create', compact('subCats'));
    }

    public function getState(Request $request)
    {
        // $data['states'] = State::where("country_id", $request->country_id)
        //     ->get(["name", "id"]);
        // return response()->json($data);
        $data['states'] = DB::table('states')->where('country_id', '=', $request->country_id)->get();
        // dd($states);
        return response()->json($data);;
    }

    public function getCity(Request $request)
    {
        // $data['states'] = State::where("country_id", $request->country_id)
        //     ->get(["name", "id"]);
        // return response()->json($data);
        $data['cities'] = DB::table('cities')->where('state_id', '=', $request->state_id)->get();
        // dd($states);
        return response()->json($data);;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check Duplicate Data in knowledge table
        $rules = [
            'sub_menu'          => 'required',
            'sub_sub_menu'      => 'required',
            'title'             => 'required|unique:knowledges',
            'country'           => 'required',
            'state'             => 'required',
            'business_category' => 'required',
            'is_feature'        => 'required',
            'publish_date'      => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'news_image'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tags'              => 'required',
            'meta_title'        => 'required',
            'meta_keyword'      => 'required',
            'meta_description'  => 'required',
            'author'            => 'required'

        ];

        $customMessage = [
            'title.required'    => 'Title is required.',
            'title.unique'      => 'Title Already Exist.',
            'country'           => 'Country is  required.',
            'state'             => 'State Size is  required.',
            'business_category' => 'Business Category is  required.',
            'is_feature'        => 'Is Features is  required.',
            'publish_date'      => 'Publish Date is  required.',
            'short_description' => 'Short Description is  required.',
            'description'       => 'Description is  required.',
            'tags'              => 'Tags is required.',
            'meta_title'        => 'Meta Title is required.',
            'meta_keyword'      => 'Meta Keyword is required.',
            'meta_description'  => 'Meta Description is required.',
            'author'            => 'Author is required.'
        ];

        $this->validate($request, $rules, $customMessage);

        $slug = Str::slug($request->title, '-');
        $thumbnail = $request->file('news_image');
        $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $knowledgeInputData = [
            'home_menu_id'    => 1,
            'sub_menu_id'     => $request->sub_menu,
            'sub_sub_menu_id' => $request->sub_sub_menu,
            'title'           => $request->title,
            'slug'            => $slug,
            'country'         => $request->country,
            'state'           => $request->state,
            'business_cate'   => $request->business_category,
            'is_featured'     => $request->is_feature,
            'publish_date'    => $request->publish_date,
            'short_desc'      => $request->short_description,
            'long_desc'       => $request->description,
            'thubmnail'       => $imageName,
            'tags'            => implode(',', $request->tags),
            'meta_title'      => $request->meta_title,
            'meta_keyword'    => implode(',', $request->meta_keyword),
            'meta_desc'       => $request->meta_description,
            'author'          => $request->author

        ];

        Knowledge::insert($knowledgeInputData);
        $thumbnail->move(public_path('/uploads/knowledge/posts'), $imageName);
        return back()->with('success', 'Knowlegde Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        // dd($knowledge);
        $countries = DB::table('countries')->get();
        $subCats = Category::where('parent_id', 1)->get();


        return view('admin.knowledge.edit', compact('countries', 'subCats', 'knowledge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        // dd($knowledge['id']);
        //Check Duplicate Data in knowledge table
        $rules = [
            'sub_menu'          => 'required',
            'sub_sub_menu'      => 'required',
            'title'             => 'required|unique:knowledges,title,' . $knowledge['id'],
            'country'           => 'required',
            'state'             => 'required',
            'business_category' => 'required',
            'is_feature'        => 'required',
            'publish_date'      => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'news_image'        => 'image|mimes:jpeg,png,jpg|max:2048',
            'tags'              => 'required',
            'meta_title'        => 'required',
            'meta_keyword'      => 'required',
            'meta_description'  => 'required',
            'author'            => 'required'

        ];

        $customMessage = [
            'title.required'    => 'Title is required.',
            'title.unique'      => 'Title Already Exist.',
            'country'           => 'Country is  required.',
            'state'             => 'State Size is  required.',
            'business_category' => 'Business Category is  required.',
            'is_feature'        => 'Is Features is  required.',
            'publish_date'      => 'Publish Date is  required.',
            'short_description' => 'Short Description is  required.',
            'description'       => 'Description is  required.',
            'tags'              => 'Tags is required.',
            'meta_title'        => 'Meta Title is required.',
            'meta_keyword'      => 'Meta Keyword is required.',
            'meta_description'  => 'Meta Description is required.',
            'author'            => 'Author is required.'
        ];

        $this->validate($request, $rules, $customMessage);

        $slug = Str::slug($request->title, '-');

        if ($request->file('news_image') != null) {
            $thumbnail = $request->file('news_image');
            $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
            $thumbnail->move(public_path('/uploads/knowledge/posts'), $imageName);
            unlink(public_path('/uploads/knowledge/posts/' . $knowledge['thubmnail']));
            $knowledgeInputData = [
                'home_menu_id'    => 1,
                'sub_menu_id'     => $request->sub_menu,
                'sub_sub_menu_id' => $request->sub_sub_menu,
                'title'           => $request->title,
                'slug'            => $slug,
                'country'         => $request->country,
                'state'           => $request->state,
                'business_cate'   => $request->business_category,
                'is_featured'     => $request->is_feature,
                'publish_date'    => $request->publish_date,
                'short_desc'      => $request->short_description,
                'long_desc'       => $request->description,
                'thubmnail'       => $imageName,
                'tags'            => implode(',', $request->tags),
                'meta_title'      => $request->meta_title,
                'meta_keyword'    => implode(',', $request->meta_keyword),
                'meta_desc'       => $request->meta_description,
                'author'          => $request->author

            ];
        } else {
            $knowledgeInputData = [
                'home_menu_id'    => 1,
                'sub_menu_id'     => $request->sub_menu,
                'sub_sub_menu_id' => $request->sub_sub_menu,
                'title'           => $request->title,
                'slug'            => $slug,
                'country'         => $request->country,
                'state'           => $request->state,
                'business_cate'   => $request->business_category,
                'is_featured'     => $request->is_feature,
                'publish_date'    => $request->publish_date,
                'short_desc'      => $request->short_description,
                'long_desc'       => $request->description,
                'tags'            => implode(',', $request->tags),
                'meta_title'      => $request->meta_title,
                'meta_keyword'    => implode(',', $request->meta_keyword),
                'meta_desc'       => $request->meta_description,
                'author'          => $request->author

            ];
        }


        $knowledge->update($knowledgeInputData);

        return redirect('admin/knowledge')->with('success', 'Knowlegde Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        unlink(public_path('/uploads/knowledge/posts/' . $knowledge['thubmnail']));
        $knowledge->delete();
    }


    public function showIndex($maincat, $subcaturl)
    {
        // dd($maincat);
        $getSubCat = Category::where('url', $subcaturl)->first();
        $knowledgeSliders = Knowledge::where('sub_menu_id', $getSubCat->id)->where('is_featured', 1)->with('subSubCat')->orderBy('id', 'desc')->limit(4)->get();
        // $knowledges = Knowledge::where('sub_menu_id',$getSubCat->id)->with('subSubCat')->orderBy('id', 'desc')->get();
        $knowledges = Category::where('parent_id', $getSubCat->id)->with('knowledges')->get();

        // dd($knowledgeSliders);
        // print_r($getSubCat->childrenCategories);
        // print_r($knowledges);
        // foreach($knowledges as $item)
        // {
        //     print_r($item->knowledge);
        //     foreach($item->knowledge as $item1)
        //     {
        //         echo $item1->title."<br>";
        //     }
        // }
        // die;
        // $getKnowledges = Knowledge::where('slug',$slug)->get();
        // print_r($knowledgeSliders);
        // die;
        return view('frontend.knowledge.master_index', compact('knowledges', 'getSubCat', 'knowledgeSliders', 'maincat'));
    }

    public function showPostDetail($maincat, $subcaturl, $postslug)
    {
        $knowledge = Knowledge::where('slug', $postslug)->first();
        $subCat = Category::where('url', $subcaturl)->first();
        $musReadKnowledges = Knowledge::where('sub_menu_id', $subCat->id)->with('subSubCat')->get();

        // print_r($musReadKnowledges);


        return view('frontend.knowledge.detail_page', compact('knowledge', 'maincat', 'subCat', 'musReadKnowledges'));
    }

    public function showCategoryPost($cat, $subcat, $subsubid)
    {

        $knowledgeCatPostLists = Knowledge::where('sub_sub_menu_id', $subsubid)->with('subSubCat')->paginate(10);
        $subsubcat = Category::where('id', $subsubid)->first();
        // dd($subsubcat);


        return view('frontend.knowledge.category_post_list', compact('knowledgeCatPostLists', 'subcat', 'cat', 'subsubcat'));
    }
}

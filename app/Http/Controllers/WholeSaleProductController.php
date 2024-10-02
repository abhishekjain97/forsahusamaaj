<?php

namespace App\Http\Controllers;

use App\Models\WholeSaleProduct;
use Illuminate\Http\Request;

class WholeSaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wholeSaleProducts = WholeSaleProduct::all();
        return view('admin.wholesale.index', compact('wholeSaleProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wholesale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //Check Duplicate Data in product table
        $rules = [
            'pname' => 'required|unique:products',
            'pfabric' => 'required',
            'pdesc' => 'required',
            'pprice' => 'required',
            'pimg.*' => 'image|mimes:jpeg,png,jpg|max:2048'

        ];

        $customMessage = [
            'pname.required' => 'Product Name is required.',
            'pname.unique' => 'Product Name Already Exist.',
            'pfabric' => 'Product Fabric is  required.',
            'pdesc' => 'Product Description is  required.',
        ];

        $this->validate($request, $rules, $customMessage);

        $images = array();
        $files = $request->file('pimg');
        foreach ($files as $value) {
            $imageOrignalName  = strtolower(trim($value->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
            $value->move(public_path('/uploads/wholesaleproducts'), $imageName);
            $images[] = $imageName;
        }

        $uploadImageName = implode(',', $images);
        $wholesaleProduct = [
            'pname' => $request->pname,
            'pfabric' => $request->pfabric,
            'pprice' => $request->pprice,
            'pdescription' => $request->pdesc,
            'pimages' => $uploadImageName

        ];

        WholeSaleProduct::insert($wholesaleProduct);
        return back()->with('success', 'Product Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WholeSaleProduct  $wholeSaleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WholeSaleProduct $wholeSaleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WholeSaleProduct  $wholeSaleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wholeSaleProduct = WholeSaleProduct::find($id);

        return view('admin.wholesale.edit', compact('wholeSaleProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WholeSaleProduct  $wholeSaleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $wholeSaleProduct = WholeSaleProduct::find($id);

        $rules = [
            'pname' => 'required|unique:products',
            'pfabric' => 'required',
            'pprice' => 'required',
            'pdesc' => 'required',

        ];

        $customMessage = [
            'pname.required' => 'Product Name is required.',
            'pname.unique' => 'Product Name Already Exist.',
            'pfabric' => 'Product Fabric is  required.',
        ];

        $this->validate($request, $rules, $customMessage);



        if ($request->file('pimg') != null) {
            $images = array();
            $files = $request->file('pimg');
            foreach ($files as $value) {
                $imageOrignalName  = strtolower(trim($value->getclientoriginalextension()));
                $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
                $value->move(public_path('/uploads/wholesaleproducts'), $imageName);
                $images[] = $imageName;
            }
            $storeImages = explode(',', $wholeSaleProduct['pimages']);

            
            foreach ($storeImages as $storeImage) {
                unlink(public_path('/uploads/wholesaleproducts/' . $storeImage));
            }

            $uploadImageName = implode(',', $images);
            $data = [
                'pname' => $request->pname,
                'pfabric' => $request->pfabric,
                'pprice' => $request->pprice,
                'pdescription' => $request->pdesc,
                'pimages' => $uploadImageName

            ];
        } else {

            $data = [
                'pname' => $request->pname,
                'pfabric' => $request->pfabric,
                'pprice' => $request->pprice,
                'pdescription' => $request->pdesc

            ];
        }

        WholeSaleProduct::where('id', $id)->update($data);

        return redirect('admin/wholesaleproduct')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WholeSaleProduct  $wholeSaleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wholeSaleProduct = WholeSaleProduct::find($id);
        $storeImages = explode(',', $wholeSaleProduct['pimages']);

        foreach ($storeImages as $storeImage) {
            unlink(public_path('/uploads/wholesaleproducts/' . $storeImage));
        }
        $wholeSaleProduct->delete();
        return back()->with('success', 'Product Deleted');
    }
}

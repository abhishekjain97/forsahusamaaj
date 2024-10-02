<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();


        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as  $cat) {
            $categories_dropdown .= "<option value='$cat->id'>$cat->name</option>";
        }

        return view('admin.product.create', compact('categories_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check Duplicate Data in product table
        $rules = [
            'pname' => 'required|unique:products',
            'pcolor' => 'required',
            'psize' => 'required',
            'pfabric' => 'required',
            'pprice' => 'required',
            'pofferprice' => 'required',
            'pdesc' => 'required',
            'pquantity' => 'required',
            'pimg.*' => 'image|mimes:jpeg,png,jpg|max:2048'

        ];

        $customMessage = [
            'pname.required' => 'Product Name is required.',
            'pname.unique' => 'Product Name Already Exist.',
            'pcolor' => 'Product Color is  required.',
            'psize' => 'Product Size is  required.',
            'pfabric' => 'Product Fabric is  required.',
            'pprice' => 'Product Price is  required.',
            'pofferprice' => 'Product Offer Price is  required.',
            'pdesc' => 'Product Description is  required.',
            'pquantity' => 'Product Quantity is required.',
        ];

        $this->validate($request, $rules, $customMessage);

        $images = array();
        $files = $request->file('pimg');
        foreach ($files as $value) {
            $imageOrignalName  = strtolower(trim($value->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
            $value->move(public_path('/uploads/products'), $imageName);
            $images[] = $imageName;
        }
        $uploadSize = implode(',', $request->psize);
        $uploadImageName = implode(',', $images);
        $product = [
            'pname' => $request->pname,
            'pcategory' => $request->pcategory,
            'subcategory' => $request->subcategory,
            'pcolor' => $request->pcolor,
            'psize' => $uploadSize,
            'pfabric' => $request->pfabric,
            'pactualprice' => $request->pprice,
            'pofferprice' => $request->pofferprice,
            'pdiscount' => $request->pdiscount,
            'pdescription' => $request->pdesc,
            'pquantity' => $request->pquantity,
            'pimages' => $uploadImageName

        ];

        Product::insert($product);
        return back()->with('success', 'Product Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Check Duplicate Data In Product Table
        $rules = [
            'pname' => 'required|unique:products,pname,' . $product['id'],
            'pcolor' => 'required',
            'psize' => 'required',
            'pfabric' => 'required',
            'pprice' => 'required',
            'pofferprice' => 'required',
            'pdesc' => 'required',
            'pquantity' => 'required',
            'pimg.*' => 'image|mimes:jpeg,png,jpg|max:2048'

        ];

        $customMessage = [
            'pname.required' => 'Product Name is required.',
            'pname.unique' => 'Product Name Already Exist.',
            'pcolor' => 'Product Color is  required.',
            'psize' => 'Product Size is  required.',
            'pfabric' => 'Product Fabric is  required.',
            'pprice' => 'Product Price is  required.',
            'pofferprice' => 'Product Offer Price is  required.',
            'pdesc' => 'Product Description is  required.',
            'pquantity' => 'Product Quantity is required.',
        ];
        $this->validate($request, $rules, $customMessage);

        $uploadSize = implode(',', $request->psize);

        if ($request->file('pimg') != null) {
            $images = array();
            $files = $request->file('pimg');
            foreach ($files as $value) {
                $imageOrignalName  = strtolower(trim($value->getclientoriginalextension()));
                $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
                $value->move(public_path('/uploads/products'), $imageName);
                $images[] = $imageName;
            }
            $storeImages = explode(',', $product['pimages']);

            foreach ($storeImages as $storeImage) {
                unlink(public_path('/uploads/products/' . $storeImage));
            }

            $uploadImageName = implode(',', $images);
            $productUpdate = [
                'pname' => $request->pname,
                'pcategory' => $request->pcategory,
                'subcategory' => $request->subcategory,
                'pcolor' => $request->pcolor,
                'psize' => $uploadSize,
                'pfabric' => $request->pfabric,
                'pactualprice' => $request->pprice,
                'pofferprice' => $request->pofferprice,
                'pdiscount' => $request->pdiscount,
                'pdescription' => $request->pdesc,
                'pquantity' => $request->pquantity,
                'pimages' => $uploadImageName

            ];
        } else {

            $productUpdate = [
                'pname' => $request->pname,
                'pcategory' => $request->pcategory,
                'subcategory' => $request->subcategory,
                'pcolor' => $request->pcolor,
                'psize' => $uploadSize,
                'pfabric' => $request->pfabric,
                'pactualprice' => $request->pprice,
                'pofferprice' => $request->pofferprice,
                'pdiscount' => $request->pdiscount,
                'pdescription' => $request->pdesc,
                'pquantity' => $request->pquantity

            ];
        }

        $product->update($productUpdate);

        return redirect('admin/product')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $storeImages = explode(',', $product['pimages']);

        foreach ($storeImages as $storeImage) {
            unlink(public_path('/uploads/products/' . $storeImage));
        }
        $product->delete();
        return back()->with('success', 'Product Deleted');
    }

    public function test()
    {
        $sessindata = session()->get('product');
        
        return view('frontend.create_account');
        // $request->session()->flush();
        // dd($sessindata);
    }
}

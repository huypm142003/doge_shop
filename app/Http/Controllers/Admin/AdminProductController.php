<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Products - DogeShop';
        $viewData['products'] = Product::all();
        $viewData['brands'] = Brands::all();
        $viewData['productTypes'] = ProductType::all();
        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'descriptionDetail' => 'required',
            'isFeatured' => 'required',
            'isBestSeller' => 'required',
            'product_type_id' => 'required',
            'brand_id' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->descriptionDetail = $request->descriptionDetail;
        $product->isFeatured = $request->isFeatured;
        $product->isBestSeller = $request->isBestSeller;
        $product->product_type_id = $request->product_type_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        return back();
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Edit Products - DogeShop';
        $viewData['products'] = Product::findorfail($id);
        $viewData['brands'] = Brands::all();
        $viewData['productTypes'] = ProductType::all();
        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'descriptionDetail' => 'required',
            'isFeatured' => 'required',
            'isBestSeller' => 'required',
            'product_type_id' => 'required',
            'brand_id' => 'required',
        ]);
        $product = Product::findorfail($id);
        $product->setName($request->name);
        $product->setPrice($request->price);
        $product->setDescription($request->description);
        $product->setDescriptionDetail($request->descriptionDetail);
        $product->setIsFeatured($request->isFeatured);
        $product->setIsBestSeller($request->isBestSeller);
        $product->setProductTypeId($request->product_type_id);
        $product->setBrandId($request->brand_id);
        $product->save();
        return redirect()->route('admin.product.index');
    }

}

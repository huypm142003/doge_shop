<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductImageController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Product Images - DogeShop';
        $viewData['productImages']  = ProductImage::all();
        $viewData['products'] = Product::all();
        return view('admin.productImage.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'product_id' => 'required',
            'image' => 'required',
        ]);
        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = $request->image;
        $productImage->save();
        if ($request->hasFile('image')) {
            $imageName = $productImage->getId(). "_product_Image" . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $productImage->setImage($imageName);
            $productImage->save();
        }
        return back();
    }

    public function delete($id)
    {
        $productImage = ProductImage::find($id);
        $productImage->delete();
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Product Images - DogeShop';
        $viewData['productImages'] = ProductImage::find($id);
        $viewData['products'] = Product::all();
        return view('admin.productImage.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'product_id' => 'required',
            'image' => 'required',
        ]);
        $productImage = ProductImage::find($id);
        $productImage->setProductID($request->product_id);
        $productImage->setImage($request->image);
        if ($request->hasFile('image')) {
            $imageName = $productImage->getId(). "_product_Image" . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $productImage->setImage($imageName);
            $productImage->save();
        }
        $productImage->save();
        return redirect()->route('admin.productImage.index');
    }
}

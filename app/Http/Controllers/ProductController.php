<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Products - DogeShop';
        $viewData['products'] = Product::all();
        return view('product.index')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findorFail($id);
        $viewData['title'] = $product->getName() . ' - DogeShop';
        $viewData['product'] = $product;
        return view('product.show')->with('viewData', $viewData);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductTypeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Product Types - DogeShop';
        $viewData['productTypes'] = ProductType::all();
        return view('admin.productType.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $productType = new ProductType();
        $productType->name = $request->name;
        $productType->save();
        return back();
    }

    public function delete($id)
    {
        ProductType::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Product Types - DogeShop';
        $viewData['productTypes'] = ProductType::findorfail($id);
        return view('admin.productType.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $productType = ProductType::findorfail($id);
        $productType->setName($request->name);
        $productType->save();
        return redirect()->route('admin.productType.index');
    }
}

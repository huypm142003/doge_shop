<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Brands - DogeShop';
        $viewData['brands'] = Brands::all();
        return view('admin.brand.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = new Brands();
        $brand->name = $request->name;
        $brand->save();
        return back();
    }

    public function delete($id)
    {
        Brands::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Edit Brands - DogeShop';
        $viewData['brands'] = Brands::findorfail($id);
        return view('admin.brand.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = Brands::findorfail($id);
        $brand->setName($request->name);
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

}

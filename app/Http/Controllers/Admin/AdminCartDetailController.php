<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCartDetailController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Cart Detail - DogeShop';
        $viewData['cartDetails'] = CartDetail::all();
        $viewData['carts'] = Cart::all();
        $viewData['products'] = Product::all();
        return view('admin.cartDetail.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
            'cart_id' => 'required',
            'product_id' => 'required',
        ]);
        $cartDetail = new CartDetail();
        $cartDetail->quantity = $request->quantity;
        $cartDetail->price = $request->price;
        $cartDetail->cart_id = $request->cart_id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->save();
        return back();
    }

    public function delete($id)
    {
        $cartDetail = CartDetail::find($id);
        $cartDetail->delete();
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Cart Detail - DogeShop';
        $viewData['cartDetails'] = CartDetail::find($id);
        $viewData['carts'] = Cart::all();
        $viewData['products'] = Product::all();
        return view('admin.cartDetail.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
            'cart_id' => 'required',
            'product_id' => 'required',
        ]);

        $cartDetail = CartDetail::find($id);
        $cartDetail->setQuantity($request->quantity);
        $cartDetail->setPrice($request->price);
        $cartDetail->setCartId($request->cart_id);
        $cartDetail->setProductId($request->product_id);
        $cartDetail->save();
        return redirect()->route('admin.cartDetail.index');
    }
}

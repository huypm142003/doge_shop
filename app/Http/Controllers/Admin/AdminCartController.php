<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Cart - DogeShop';
        $viewData['carts'] = Cart::all();
        $viewData['users'] = User::all();
        return view('admin.cart.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'user_id' => 'required',
        ]);
        $cart = new Cart();
        $cart->total = $request->total;
        $cart->user_id = $request->user_id;
        $cart->save();
        return back();
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Cart - DogeShop';
        $viewData['carts'] = Cart::find($id);
        $viewData['users'] = User::all();
        return view('admin.cart.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'total' => 'required',
            'user_id' => 'required',
        ]);
        $cart = Cart::find($id);
        $cart->setTotal($request->total);
        $cart->setUserId($request->user_id);
        $cart->save();
        return redirect()->route('admin.cart.index');
    }
}

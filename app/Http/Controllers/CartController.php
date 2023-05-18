<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData["title"] = "Cart - DogeShop";
        $viewData["total"] = $total;
        $viewData['ship'] = $productsInSession ? 5 : 0;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {   
        $products = $request->session()->get("products");
        //Check product already in cart
        if ($products && array_key_exists($id, $products)) {
            $products[$id] += $request->input("quantity");
        } else {
            $products[$id] = $request->input("quantity");
        }
        if ($request->input("quantity") === null ) {
            $products[$id] = 1;
        }
        $request->session()->put("products", $products);
        return redirect()->route("cart.index");
    }

    public function delete(Request $request, $id)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put("products", $products);
        return redirect()->route("cart.index");
    }

    public function purchase(Request $request)
    {
       $productsInSession = $request->session()->get("products");
       if ($productsInSession) {
            $userId = Auth::user()->getId();
            $cart = new Cart();
            $cart->setUserId($userId);
            $cart->setTotal(0);
            $cart->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $cartDetail = new CartDetail();
                $cartDetail->setQuantity($quantity);
                $cartDetail->setPrice($product->getPrice());
                $cartDetail->setProductId($product->getId());
                $cartDetail->setCartId($cart->getId());
                $cartDetail->save();
                $total += $product->getPrice() * $quantity;
            }
            $cart->setTotal($total);
            $cart->save();

            $viewData = [];
            $viewData["title"] = "Purchase - DogeShop";
            $viewData['cart'] = $cart;
            
            // Clear cart
            $request->session()->forget("products");

            return view('cart.purchase')->with("viewData", $viewData);
       } else {
           return redirect()->route("cart.index");
       }
    }
}

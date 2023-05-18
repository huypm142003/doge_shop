<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{   
    public $timestamps = false;

    public static function validate($request)
    {
        $request->validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "cart_id" => "required|exists:carts,id",
            "product_id" => "required|exists:products,id",
        ]);
    }

    public function getId()
    {
        return $this->attributes["id"];
    }

    public function setId($id)
    {
        $this->attributes["id"] = $id;
    }

    public function getPrice()
    {
        return $this->attributes["price"];
    }

    public function setPrice($price)
    {
        $this->attributes["price"] = $price;
    }

    public function getQuantity()
    {
        return $this->attributes["quantity"];
    }

    public function setQuantity($quantity)
    {
        $this->attributes["quantity"] = $quantity;
    }

    public function getCartId()
    {
        return $this->attributes["cart_id"];
    }

    public function setCartId($cartId)
    {
        $this->attributes["cart_id"] = $cartId;
    }

    public function getProductId()
    {
        return $this->attributes["product_id"];
    }

    public function setProductId($productId)
    {
        $this->attributes["product_id"] = $productId;
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

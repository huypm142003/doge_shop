<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{   
    public static function validate($request)
    {
        $request->validate([
            "total" => "required|numeric",
            "user_id" => "required|exists:users,id",
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

    public function getTotal()
    {
        return $this->attributes["total"];
    }

    public function setTotal($total)
    {
        $this->attributes["total"] = $total;
    }

    public function getUserId()
    {
        return $this->attributes["user_id"];
    }

    public function setUserId($userId)
    {
        $this->attributes["user_id"] = $userId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user();
    }

    public function setUser($user)
    {
        $this->user()->$user;
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function getCartDetails()
    {
        return $this->cartDetails();
    }

    public function setCartDetails($cartDetails)
    {
        $this->cartDetails()->$cartDetails;
    }

    public function getShipping()
    {
        return $this->attributes["shipping"];
    }

    public function setShipping($shipping)
    {
        $this->attributes["shipping"] = $shipping;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getDescriptionDetail()
    {
        return $this->attributes['descriptionDetail'];
    }

    public function setDescriptionDetail($descriptionDetail)
    {
        $this->attributes['descriptionDetail'] = $descriptionDetail;
    }

    public function getIsFeatured()
    {
        return $this->attributes['isFeatured'];
    }

    public function setIsFeatured($isFeatured)
    {
        $this->attributes['isFeatured'] = $isFeatured;
    }

    public function getIsBestSeller()
    {
        return $this->attributes['isBestSeller'];
    }

    public function setIsBestSeller($isBestSeller)
    {
        $this->attributes['isBestSeller'] = $isBestSeller;
    }

    public function getProductTypeId()
    {
        return $this->attributes['product_type_id'];
    }

    public function setProductTypeId($productTypeId)
    {
        $this->attributes['product_type_id'] = $productTypeId;
    }

    public function getBrandId()
    {
        return $this->attributes['brand_id'];
    }

    public function setBrandId($brandId)
    {
        $this->attributes['brand_id'] = $brandId;
    }

    public function getImage()
    {
        if (ProductImage::where('product_id', $this->getId())->first() === null) {
            return null;
        }
        return ProductImage::where('product_id', $this->getId())->first()->getImage();
    }

    public function getImage2()
    {
        if (ProductImage::where('product_id', $this->getId())->skip(1)->first() === null) {
            return null;
        }
        return ProductImage::where('product_id', $this->getId())->skip(1)->first()->getImage();
    }

    public function getImage3()
    {
        if (ProductImage::where('product_id', $this->getId())->skip(2)->first() === null) {
            return null;
        }
        return ProductImage::where('product_id', $this->getId())->skip(2)->first()->getImage();
    }

    public function getBrandName()
    {
        return Brands::find($this->getBrandId())->getName();
    }

    public static function sumPricesByQuantities($products, $quantities)
    {   
        $shiping = 5;
        $total = 0;
        foreach ($products as $product) {
            $total += $product->getPrice() * $quantities[$product->getId()];
        }
        return $total+$shiping;
    }

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function getCartDetail()
    {
        return $this->cartDetail;
    }

    public function setCartDetail($cartDetail)
    {
        $this->cartDetail = $cartDetail;
    }
}

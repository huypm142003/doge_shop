<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
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

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getContent()
    {
        return $this->attributes['content'];
    }

    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function setDate($date)
    {
        $this->attributes['date'] = $date;
    }
}

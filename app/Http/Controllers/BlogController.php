<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Blog - DogeShop';
        $viewData['blogs'] = Blogs::all();
        return view('blog.index') -> with('viewData', $viewData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Home - DogeShop';
        $viewData['products'] = Product::all();
        return view('home.index') -> with('viewData', $viewData);
    }

    public function contact()
    {
        $viewData = [];
        $viewData['title'] = 'Contact - DogeShop';
        return view('home.contact') -> with('viewData', $viewData);
    }
}

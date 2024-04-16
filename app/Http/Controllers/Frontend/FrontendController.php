<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller {

    public function index() {

        return view('frontend.index', [
            'cartItems' => Session::get('cart'),
            'categories' => Category::all(),
            'products' => Product::all()->sortByDesc('id'),
        ]);
    }


    public function about() {

        return view('frontend.about', [
            'cartItems' => Session::get('cart'),
            'categories' => Category::all(),
        ]);
    }


    public function contact() {

        return view('frontend.contact', [
            'cartItems' => Session::get('cart'),
            'categories' => Category::all(),
        ]);
    }
}

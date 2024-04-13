<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index() {
        return view('frontend.index', ['products' => Product::all(), 'categories' => Category::all(), 'brands' => Brand::all()]);
    }
}

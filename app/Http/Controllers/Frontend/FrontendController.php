<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class FrontendController extends Controller {

    public function index() {
        $cart = Session::get('cart'); // ดึงข้อมูลตะกร้าสินค้า

        return view('frontend.index', [
            'cartItems' => $cart,
            'products' => Product::all()->sortByDesc('id'),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    public function about() {
        return view('frontend.about', ['categories' => Category::all()]);
    }

    public function contact() {
        return view('frontend.contact', ['categories' => Category::all()]);
    }
}

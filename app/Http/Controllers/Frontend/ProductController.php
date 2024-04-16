<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller {

  public function productView($product_id) {

    $product = Product::find($product_id);

    // For Related Products
    $category_id = $product->category_id;
    $category = Category::find($category_id);
    // dd($category->products);
    $productsByCategory = $category->products;

    return view('frontend.productView', [
      'cartItems' => Session::get('cart'),
      'categories' => Category::all(),
      'product' => $product, 
      'productsByCategory' => $productsByCategory, 
    ]);
  }


  public function productByCategory($category_id) {

    $category = Category::find($category_id);
    // dd($category->products);

    $products = $category->products; // Model Category -> function products

    return view('frontend.productByCategory', [
      'cartItems' => Session::get('cart'),
      'categories' => Category::all(),
      'category' => $category, 
      'products' => $products,
    ]);
  }


  public function productByBrand($brand_id) {

    $brand = Brand::find($brand_id);
    // dd($brand->products);

    $products = $brand->products; // Model Brand -> function products

    return view('frontend.productByBrand', [
      'cartItems' => Session::get('cart'),
      'categories' => Category::all(),
      'brand' => $brand, 
      'products' => $products,
    ]);
  }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller {

  public function productView($product_id) {

    $categories = Category::all(); // For Menu

    $product = Product::find($product_id);

    // For Related Products
    $category_id = $product->category_id;
    $category = Category::find($category_id);
    // dd($category->products);
    $productsByCategory = $category->products;

    return view('frontend.productView', [
      'product' => $product, 
      'productsByCategory' => $productsByCategory, 
      'categories' => $categories
    ]);
  }


  public function productByCategory($category_id) {

    $categories = Category::all(); // For Menu

    $category = Category::find($category_id);
    // dd($category->products);

    $products = $category->products; // Model Category -> function products

    return view('frontend.productByCategory', [
      'categories' => $categories,
      'category' => $category, 
      'products' => $products
    ]);
  }


  public function productByBrand($brand_id) {

    $categories = Category::all(); // For Menu

    $brand = Brand::find($brand_id);
    // dd($brand->products);

    $products = $brand->products; // Model Brand -> function products

    return view('frontend.productByBrand', [
      'categories' => $categories,
      'brand' => $brand, 
      'products' => $products
    ]);
  }
}

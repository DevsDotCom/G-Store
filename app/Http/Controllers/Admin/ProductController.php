<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);

        return view('admin.Product', ['products' => $products]);
    }


    public function add() {
        return view('admin.addProduct', ['categories' => Category::all(), 'brands' => Brand::all()]);
    }


    public function insert(Request $request) {
        // dd($request);

        $request->validate([
            'name' => 'required',

            'description' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|file|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        // Convert Image Name
        $stringImageReFormat = base64_encode('_'.time());
        $ext = $request->file('image')->getClientOriginalExtension();
        $imageName = $stringImageReFormat.".".$ext;
        $imageEncoded = File::get($request->image);

        // Upload Image File
        Storage::disk('local')->put('public/product_image/'.$imageName, $imageEncoded);

        // Insert
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $imageName;
        $product->save();
        $category = new Category;

        return redirect('/admin/Product');
    }
}

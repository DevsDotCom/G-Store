<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('verifyIsCategory')->only(['add', 'insert']);
        $this->middleware('verifyIsBrand')->only(['add', 'insert']);
    }


    public function index() {
        $products = Product::paginate(10);

        return view('admin.Product', ['products' => $products]);
    }


    public function add() {
        return view('admin.addProduct', ['categories' => Category::all(), 'brands' => Brand::all()]);
    }


    public function insert(Request $request) {

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
        
        Session()->flash('success', 'Add complete!');

        return redirect('/admin/Product');
    }


    public function edit($id) {
        $product = Product::find($id);

        return view('admin.editProduct', ['product' => $product, 'categories' => Category::all(), 'brands' => Brand::all()]);
    }


    public function update(Request $request) {

        // Validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        // Update
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        Session()->flash('success', 'Edit complete!');

        return redirect('admin/Product');
    }


    public function editImage($id) {
        $product = Product::find($id);

        return view('admin.editProductImage', ['product' => $product]);
    }


    public function updateImage(Request $request) {

        // Validate
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        if ($request->hasFile('image')) {
            $product = Product::find($request->id);
            $imagePath = 'public/product_image/';
            $exists = Storage::disk('local')->exists($imagePath.$product->image);

            if ($exists) {
                Storage::delete($imagePath.$product->image);
            }
            
            $request->image->storeAs($imagePath, $product->image);

            return redirect('/admin/Product');
        }
    }


    public function delete($id) {

        $product = Product::find($id);
        $imagePath = 'public/product_image/';
        $exists = Storage::disk('local')->exists($imagePath . $product->image);

        if ($exists) {
            Storage::delete($imagePath . $product->image);
        }

        Product::destroy($id);

        Session()->flash('success', 'Delete complete!');

        return redirect('admin/Product');
    }
}

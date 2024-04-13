<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::paginate(5);

        // return view('admin.Category', compact('categories'));
        return view('admin.Category', ['categories' => $categories]);
    }


    public function insert(Request $request) {
        // dd($request->name);

        $request->validate([
            // 'name' => 
            // [
            //     'required', 
            //     'unique:categories',
            //     'max:50',
            // ],
            // [
            //     'name.required' => 'กรุณาป้อน Category Name',
            //     'name.unique' => 'Category Name มีอยู่แล้วในฐานข้อมูล',
            //     'name.max' => 'Category Name จะต้องมีความยาวไม่เกิน 50 ตัวอักษร',
            // ]

            'name' => 'required|unique:categories|max:50',
            'image' => 'required|file|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        // Convert Image Name
        $stringImageReFormat = base64_encode('_' . time());
        $ext = $request->file('image')->getClientOriginalExtension();
        $imageName = $stringImageReFormat . "." . $ext;
        $imageEncoded = File::get($request->image);

        // Upload Image File
        Storage::disk('local')->put('public/category_image/' . $imageName, $imageEncoded);

        // Insert
        $category = new Category;
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();

        Session()->flash('success', 'Add complete!');

        return redirect('/admin/Category');
    }

    
    public function edit($id) {
        // dd($id);

        $category = Category::find($id);
        // dd($category);

        // return view('admin.editCategory', compact('category'));
        return view('admin.editCategory', ['category' => $category]);
    }


    public function update(Request $request) {
        // dd($request);

        // Validate
        $request->validate([
            // 'name' => 'required|unique:categories|max:50',
            'name' =>
            [
                'required',
                'unique:categories',
                'max:50',
            ],
        ]);

        // Update
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();

        Session()->flash('success', 'Edit complete!');

        return redirect('admin/Category');
    }


    public function editImage($id) {
        $category = Category::find($id);

        return view('admin.editCategoryImage', ['category' => $category]);
    }


    public function updateImage(Request $request) {

        // Validate
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        if ($request->hasFile('image')) {
            $category = Category::find($request->id);
            $imagePath = 'public/category_image/';
            $exists = Storage::disk('local')->exists($imagePath . $category->image);

            if ($exists) {
                Storage::delete($imagePath . $category->image);
            }

            $request->image->storeAs($imagePath, $category->image);

            return redirect('/admin/Category');
        }
    }


    public function delete($id) {
        // dd($id);

        $category = Category::find($id);

        if ($category->products->count() > 0) {
            Session()->flash('danger', 'Cannot be deleted Because there are some products in this category!');
            return redirect()->back();
        }

        // Category::destroy($id);
        $category::destroy($id);

        Session()->flash('success', 'Delete complete!');

        return redirect('admin/Category');
    }
}

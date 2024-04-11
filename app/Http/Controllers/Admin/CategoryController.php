<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

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
            // 'name' => 'required|unique:categories|max:50',
            'name' => 
            [
                'required', 
                'unique:categories',
                'max:50',
            ],
            // [
            //     'name.required' => 'กรุณาป้อน Category Name',
            //     'name.unique' => 'Category Name มีอยู่แล้วในฐานข้อมูล',
            //     'name.max' => 'Category Name จะต้องมีความยาวไม่เกิน 50 ตัวอักษร',
            // ]
        ]);

        // Insert
        $category = new Category;
        $category->name = $request->name;
        $category->save();

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

        return redirect('admin/Category');
    }


    public function delete($id) {
        // dd($id);

        Category::destroy($id);

        return redirect('admin/Category');
    }
}

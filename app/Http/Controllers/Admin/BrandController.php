<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;

class BrandController extends Controller
{
    public function index() {
        $brands = Brand::paginate(5);

        return view('admin.Brand', ['brands' => $brands]);
    }


    public function insert(Request $request) {

        $request->validate([
            // 'name' => 'required|unique:brands|max:50',
            'name' =>
            [
                'required',
                'unique:brands',
                'max:50',
            ],
        ]);

        // Insert
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();

        Session()->flash('success', 'Add complete!');

        return redirect('/admin/Brand');
    }


    public function edit($id) {

        $brand = Brand::find($id);
        // dd($brand);

        return view('admin.editBrand', ['brand' => $brand]);
    }


    public function update(Request $request) {

        $request->validate([
            // 'name' => 'required|unique:brands|max:50',
            'name' =>
            [
                'required',
                'unique:brands',
                'max:50',
            ],
        ]);

        // Update
        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->save();

        Session()->flash('success', 'Edit complete!');

        return redirect('admin/Brand');
    }


    public function delete($id) {

        $brand = Brand::find($id);

        if ($brand->products->count() > 0) {
            Session()->flash('danger', 'Cannot be deleted Because there are some products in this Brand!');
            return redirect()->back();
        }

        $brand::destroy($id);

        Session()->flash('success', 'Delete complete!');

        return redirect('admin/Brand');
    }
}

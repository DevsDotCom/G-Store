<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(5);

        return view('admin.Brand', ['brands' => $brands]);
    }


    public function insert(Request $request)
    {
        // dd($request->name);

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

        return redirect('/admin/Brand');
    }


    public function edit($id)
    {
        // dd($id);

        $brand = Brand::find($id);
        // dd($brand);

        return view('admin.editBrand', ['brand' => $brand]);
    }


    public function update(Request $request)
    {
        // dd($request);

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

        return redirect('admin/Brand');
    }


    public function delete($id)
    {
        // dd($id);

        Brand::destroy($id);

        return redirect('admin/Brand');
    }
}

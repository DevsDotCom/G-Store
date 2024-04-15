<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Models\Category;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $categories = Category::all();

        // ค้นข้อมูลสินค้า
        $product = Product::find($id);
        // dd($product); Check Value

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $cart->addItem($id, $product); // addItem() เป็นการเพิ่มสินค้าทีละ 1 ชิ้น
        $cart->updatePriceQuantity();

        // อัพเดทตะกร้าสินค้า
        $request->session()->put('cart', $cart);
        // dump($cart); // Check Value

        return redirect('/');
        // return view('frontend.cart', ['categories' => $categories]);
    }

    public function addQuantityToCart(Request $request)
    {
        // dd($request->_id, $request->quantity); // Check Value

        $id = $request->_id;
        $quantity = $request->quantity;

        // ค้นข้อมูลสินค้า
        $product = Product::find($id);
        // dd($product); Check Value

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        // $cart->addItem($id, $product); // addItem() เป็นการเพิ่มสินค้าทีละ 1 ชิ้น
        $cart->addQuantity($id, $product, $quantity); // addQuantity() เป็นการเพิ่มสินค้าตามจำนวนที่ลูกค้ากรอกเข้ามา
        $cart->updatePriceQuantity();

        // อัพเดทตะกร้าสินค้า
        $request->session()->put('cart', $cart);
        // dump($cart); // Check Value

        return redirect('/products/cart');
    }

    public function showCart()
    {

        $cart = Session::get('cart'); // ดึงข้อมูลตะกร้าสินค้า

        if ($cart) {
            return view('frontend.cart', ['cartItems' => $cart, 'categories' => Category::all()]);
        } else {
            return redirect('/');
        }
    }

    public function deleteCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart');

        if (array_key_exists($id, $cart->items)) {
            // ลบสินค้าออกจากตะกร้า

            unset($cart->items[$id]); // ทำลายเฉพาะตัวที่เราอยากจะลบทิ้ง แต่ถ้า destroy() จะเป็นการลบ Session ทั้งหมดเลย
        }

        // สินค้าคงเหลือ
        $afterCart = $request->session()->get('cart');
        $updateCart = new Cart($afterCart);
        $updateCart->updatePriceQuantity();
        $request->session()->put('cart', $updateCart);

        return redirect('/cart');
    }

    public function incrementCart(Request $request, $id)
    {
        // ค้นข้อมูลสินค้า
        $product = Product::find($id);
        // dd($product); Check Value

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $cart->addItem($id, $product);

        // อัพเดทตะกร้าสินค้า
        $request->session()->put('cart', $cart);
        // dump($cart); // Check Value

        return redirect('/products/cart');
    }

    public function decrementCart(Request $request, $id)
    {
        // ค้นข้อมูลสินค้า
        $product = Product::find($id);
        // dd($product); Check Value

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart); // ข้อมูลในตะกร้าสินค้าปัจจุบัน

        // เข้าถึง quantity ของสินค้าที่เราเลือก
        if ($cart->items[$id]['quantity'] > 1) {

            // ลด quantity ลง 1
            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity'] - 1;

            // คำนวณราคารวมสินค้าใหม่
            $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] * $product['price'];
            $cart->updatePriceQuantity();
            $request->session()->put('cart', $cart);
        } else {
            session()->flash('warning', 'ต้องมีสินค้าอย่างน้อย 1 รายการ');
        }

        return redirect('/products/cart');
    }
}

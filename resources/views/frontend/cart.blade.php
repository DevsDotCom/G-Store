@extends('layouts.index')

@section('content')
    <!-- breadcrum -->
    <div class="py-4 container flex gap-3 items-center">
        <a href="/" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <p class="text-gray-600 font-medium uppercase">Shopping Cart</p>
    </div>
    <!-- breadcrum end -->

    <!-- cart wrapper -->
    <div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4">
        <!-- product cart -->
        <div class="xl:col-span-9 lg:col-span-8">
            <!-- cart title -->
            <div class="bg-gray-200 py-2 pl-12 pr-20 xl:pr-28 mb-4 hidden md:flex">
                <p class="text-gray-600 text-center">Product</p>
                <p class="text-gray-600 text-center ml-auto mr-16 xl:mr-24">Quantity</p>
                <p class="text-gray-600 text-center">Total</p>
            </div>
            <!-- cart title end -->

            @if ($cartItems->items != null)
            <!-- shipping carts -->
            <div class="space-y-4">
                @foreach ($cartItems->items as $item)
                    <!-- single cart -->
                    <div
                        class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                        <!-- cart image -->
                        <div class="w-32 flex-shrink-0">
                            <a href="/productView/{{ $item['data']['id'] }}">
                                <img src="{{asset('storage')}}/product_image/{{ $item['data']['image'] }}" class="w-full">
                            </a>
                        </div>
                        <!-- cart image end -->
                        <!-- cart content -->
                        <div class="md:w-1/3 w-full">
                            <h2 class="text-gray-800 mb-3 xl:text-xl textl-lg font-medium uppercase">
                                <a href="/productView/{{ $item['data']['id'] }}">
                                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                        {{ $item['data']['name'] }}
                                    </h4>
                                </a>
                            </h2>
                            <p class="text-primary font-semibold">฿ {{ number_format($item['data']['price']) }}</p>
                        </div>
                        <!-- cart content end -->

                        <!-- cart quantity -->
                        <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300">
                            <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                <a class="cart_quantity_up" href="/cart/decrementCart/{{$item['data']['id']}}">-</a>
                            </div>

                            <div class="h-8 w-10 flex items-center justify-center">{{ $item['quantity'] }}</div>

                            <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                <a class="cart_quantity_up" href="/cart/incrementCart/{{$item['data']['id']}}">+</a>
                            </div>
                        </div>
                        <!-- cart quantity end -->

                        <div class="ml-auto md:ml-0">
                            <p class="text-primary text-base font-semibold">฿ {{ number_format($item['totalSinglePrice']) }}</p>
                        </div>
                        <div class="text-gray-600 hover:text-primary cursor-pointer">
                            <a href="/cart/deleteCart/{{ $item['data']['id'] }}" onclick="return confirm('Do you want to delete?')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <!-- single cart end -->
                @endforeach
            </div>
            <!-- shipping carts end -->
            @else
                <div class="text-red-500 font-base text-center">
                    <h2 class="uppercase">Cart is empty</h2>
                    <h4>You don't have any products in your cart.</h4>
                </div>
            @endif

        </div>
        <!-- product cart end -->
        <!-- order summary -->
        <div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">ORDER SUMMARY</h4>
            <div class="space-y-1 text-gray-600 pb-3 border-b border-gray-200">
                <div class="flex justify-between font-medium">
                    <p>Subtotal</p>
                    <p>฿ {{ number_format($cartItems->totalPrice) }}</p>
                </div>
                <div class="flex justify-between">
                    <p>Delivery</p>
                    <p>Free</p>
                </div>
                <div class="flex justify-between">
                    <p>Tax</p>
                    <p>Free</p>
                </div>
            </div>
            <div class="flex justify-between my-3 text-gray-800 font-semibold uppercase text-lg">
                <h4>Total</h4>
                <h4>฿ {{ number_format($cartItems->totalPrice) }}</h4>
            </div>

            <!-- searchbar -->
            <div class="flex mb-5">
                <input type="text"
                    class="pl-4 w-full border border-r-0 border-primary py-2 px-3 rounded-l-md focus:ring-primary focus:border-primary text-sm"
                    placeholder="Coupon">
                <button type="submit"
                    class="bg-primary border border-primary text-white px-5 font-medium rounded-r-md hover:bg-transparent hover:text-primary transition text-sm font-roboto">
                    Apply
                </button>
            </div>
            <!-- searchbar end -->

            <!-- checkout -->
            <a href="checkout.html" class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent
             hover:text-primary transition text-sm w-full block text-center">
                Process to checkout
            </a>
            <!-- checkout end -->
        </div>
        <!-- order summary end -->
    </div>
    <!-- cart wrapper end -->

    
@endsection
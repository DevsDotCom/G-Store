@extends('layouts.index')

@section('content')
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36 relative" style="background-image: url('{{ asset('images/banner-bg.jpg') }}')">
        <div class="container">
            <!-- banner content -->
            <h1 class="xl:text-6xl md:text-5xl text-4xl text-gray-800 font-medium mb-4">
                Best Collection For <br class="hidden sm:block"> Home Decoration
            </h1>
            <p class="text-base text-gray-600 leading-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa <br class="hidden sm:block">
                assumenda aliquid inventore nihil laboriosam odio
            </p>
            <!-- banner button -->
            <div class="mt-12">
                <a href="shop.html" class="bg-primary border border-primary text-white px-8 py-3 font-medium rounded-md uppercase hover:bg-transparent
               hover:text-primary transition">
                    Shop now
                </a>
            </div>
            <!-- banner button end -->
            <!-- banner content end -->
        </div>
    </div>
    <!-- banner end -->

    <!-- categories -->
    <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6 mt-12">shop by category</h2>
        <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-3">
            @foreach ($categories as $category)
                <!-- single category -->
                <div class="relative group rounded-sm overflow-hidden" >
                    <img src="{{ asset('storage/category_image') }}/{{ $category->image }}" class="w-full">
                    <a href="/productByCategory/{{ $category->id }}" class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white 
                        font-roboto font-medium tracking-wide transition">
                        {{ $category->name }}
                    </a>
                </div>
                <!-- single category end -->
            @endforeach
        </div>
    </div>
    <!-- categories end -->

    <!-- top new arrival -->
    <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
        <!-- product wrapper -->
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
            @foreach ($products as $product)
                <!-- single product -->
                <div class="group rounded bg-white shadow overflow-hidden">
                    <!-- product image -->
                    <div class="relative">
                        <img src="storage/product_image/{{ $product->image }}" class="w-full">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="/productView/{{ $product->id }}"
                                class="text-white text-lg w-12 h-12 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                <i class="ri-shopping-cart-2-line text-2xl"></i>
                            </a>
                        </div>
                    </div>
                    <!-- product image end -->
                    <!-- product content -->
                    <div class="pt-4 pb-3 px-4">
                        <a href="/productView/{{ $product->id }}">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $product->name }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-roboto font-semibold">฿ {{ number_format($product->price) }}</p>
                            {{-- <p class="text-sm text-gray-400 font-roboto line-through">$55.00</p> --}}
                        </div>
                    </div>
                    <!-- product content end -->
                    <!-- product button -->
                    <a href="/addToCart/{{ $product->id }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                        Add to Cart
                    </a>
                    <!-- product button end -->
                </div>
                <!-- single product end -->
            @endforeach
        </div>
        <!-- product wrapper end -->
    </div>
    <!-- top new arrival end -->
@endsection
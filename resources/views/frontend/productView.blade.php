@extends('layouts.index')

@section('content')
    <!-- breadcrum -->
    <div class="py-4 container flex gap-3 items-center mt-8">
        <a href="/" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <a href="/" class="text-primary text-base font-medium uppercase">
            Shop
        </a>
        <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <p class="text-gray-600 font-medium uppercase">{{ $product->name }}</p>
    </div>
    <!-- breadcrum end -->

    <!-- product view -->
    <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6">
        <!-- product image -->
        <div>
            <div>
                <img id="main-img" src="{{ asset('storage/product_image') }}/{{ $product->image }}" class="w-full">
            </div>
            <div class="grid grid-cols-5 gap-4 mt-4">

            </div>
        </div>
        <!-- product image end -->
        <!-- product content -->
        <div>
            <h2 class="md:text-3xl text-2xl font-medium uppercase mb-2">{{ $product->name }}</h2>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Availability: </span>
                    @if ($product->stock > 0)
                        <span class="text-green-600">In Stock</span>
                    @else
                        <span class="text-red-600 line-through">Out of Stock</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Brand: </span>
                    <span class="text-gray-600 hover:text-primary transition"><a href="/productByBrand/{{ $product->brand_id }}">{{ $product->brand->name }}</a></span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600 hover:text-primary transition"><a href="/productByCategory/{{ $product->category_id }}">{{ $product->category->name }}</a></span>
                </p>
            </div>
            <div class="mt-4 flex items-baseline gap-3">
                <span class="text-primary font-semibold text-xl">฿ {{ number_format($product->price) }}</span>
            </div>
            <!-- quantity -->
            <div class="mt-4">
                <h3 class="text-base text-gray-800 mb-1">Quantity</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-10 flex items-center justify-center">1</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>
            <!-- color end -->
            <!-- add to cart button -->
            <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6">
                <a href="#" class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase 
                    hover:bg-transparent hover:text-primary transition text-sm flex items-center">
                    <span class="mr-2"><i class="fas fa-shopping-bag"></i></span> Add to cart
                </a>
            </div>
            <!-- add to cart button end -->
            <!-- product share icons -->
            <div class="flex space-x-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- product share icons end -->
        </div>
        <!-- product content end -->
    </div>
    <!-- product view end -->

    <!-- product details and review -->
    <div class="container pb-16">
        <!-- detail buttons -->
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium text-xl">
            Product Details
        </h3>
        <!-- details button end -->

        <!-- details content -->
        <div class="lg:w-4/5 xl:w-3/5 pt-6">
            <div class="space-y-3 text-gray-600">
                <p>
                    {{ $product->description }}
                </p>
            </div>
        </div>
        <!-- details content end -->
    </div>
    <!-- product details and review end -->

    @if ($productsByCategory->count() > 1)
        <!-- related products -->
        <div class="container pb-16">
            <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">related products</h2>
            <!-- product wrapper -->
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
                @foreach ($productsByCategory as $productByCategory)
                    @if ($productByCategory->id != $product->id)
                        <!-- single product -->
                        <div class="group rounded bg-white shadow overflow-hidden">
                            <!-- product image -->
                            <div class="relative">
                                <img src="{{ asset('storage/product_image') }}/{{ $productByCategory->image }}" class="w-full">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                    <a href="/productView/{{ $productByCategory->id }}"
                                        class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- product image end -->
                            <!-- product content -->
                            <div class="pt-4 pb-3 px-4">
                                <a href="/productView/{{ $productByCategory->id }}">
                                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                        {{ $productByCategory->name }}
                                    </h4>
                                </a>
                                <div class="flex items-baseline mb-1 space-x-2">
                                    <p class="text-xl text-primary font-roboto font-semibold">฿ {{ number_format($productByCategory->price) }}</p>
                                </div>
                            </div>
                            <!-- product content end -->
                            <!-- product button -->
                            <a href="#"
                                class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                                Add to Cart
                            </a>
                            <!-- product button end -->
                        </div>
                        <!-- single product end -->
                    @endif
                @endforeach
            </div>
            <!-- product wrapper end -->
        </div>
        <!-- related products end -->
    @endif
@endsection
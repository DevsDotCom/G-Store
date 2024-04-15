@extends('layouts.index')

@section('content')
<!-- top new arrival -->
<div class="container pb-16">
    <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6 mt-8">{{ $brand->name }}</h2>
    @if ($products->count() > 0)
        <!-- product wrapper -->
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
            @foreach ($products as $product)
                <!-- single product -->
                <div class="group rounded bg-white shadow overflow-hidden">
                    <!-- product image -->
                    <div class="relative">
                        <img src="{{ asset('storage/product_image') }}/{{ $product->image }}" class="w-full">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="/productView/{{ $product->id }}"
                                class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                <i class="fas fa-search"></i>
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
                            <p class="text-xl text-primary font-roboto font-semibold">฿ {{ number_format($product->price, 2) }}</p>
                            {{-- <p class="text-sm text-gray-400 font-roboto line-through">$55.00</p> --}}
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
            @endforeach
        </div>
        <!-- product wrapper end -->
        @else 
            <div class="text-red-500">There are no products in this brand.</div>
        @endif
    </div>
    <!-- top new arrival end -->
@endsection
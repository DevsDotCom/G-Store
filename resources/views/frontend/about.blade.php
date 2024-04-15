@extends('layouts.index')

@section('content')
    <!--breadcrums  -->
    <div class="container py-4 flex items-center gap-2">
        <a href="/" class="text-primary text-base">
            <i class="ri-home-3-line"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="ri-arrow-right-s-line"></i>
        </span>
        <p class="text-gray-600 font-medium">About us</p>
    </div>
    <!--breadcrums end  -->

    <!-- about us history -->
    <div class="container py-14">
        <div class="lg:grid grid-cols-12 gap-6 pb-20">
            <!-- left -->
            <div class="col-span-6 space-y-4">
                <p class="font-medium text-red-500 uppercase">our history</p>
                <p class="text-3xl font-medium text-gray-600">
                    CREATIVE AND NEW FASHION TRENDS COLLECTION
                </p>
                <p class="text-base text-gray-600">
                    Fashion is a potent visual marker of our times,” says Caroline
                    Stevenson, head of cultural and ... “Trend analysis of any given era
                    will reveal society's values and aspirations.” ... The urge to
                    creative expression runs deep
                </p>
                <div class="flex gap-">
                    <div class="pb-8">
                        <p class="text-red-500 text-3xl font-bold">12</p>
                        <p class="text-base text-gray-600">years Expriene</p>
                    </div>
                    <div>
                        <p class="text-red-500 text-3xl font-bold">20K</p>
                        <p class="text-base text-gray-600">Happy Customer</p>
                    </div>
                    <div>
                        <p class="text-red-500 text-3xl font-bold">100%</p>
                        <p class="text-base text-gray-600">Clients Satisfation</p>
                    </div>
                </div>
            </div>
            <!-- left end -->

            <!-- right img -->
            <div class="col-span-6 w-full bg-cover">
                <img src="../images/about-img.jpg" alt="" />
            </div>
            <!-- right img end -->
        </div>

        <div class="lg:grid grid-cols-12 gap-6">
            <!-- left -->

            <!-- left end -->

            <!-- right img -->
            <div class="col-span-6 w-full bg-cover mb-8">
                <img src="../images/about-img-2.jpg" alt="" />
            </div>
            <!-- right img end -->
            <div class="col-span-6 space-y-4">
                <p class="font-medium text-red-500 uppercase">our vision</p>
                <p class="text-3xl font-medium text-gray-600">
                    OUR VISION IS SIMPLE - WE EXIST TO ACCELERATE OUR CUSTOMERS’
                    PROGRESS
                </p>
                <p class="text-base text-gray-600">
                    Fashion is a potent visual marker of our times,” says Caroline
                    Stevenson, head of cultural and ... “Trend analysis of any given era
                    will reveal society's values and aspirations.” ... The urge to
                    creative expression runs deep
                </p>
                <div class="flex gap-2">
                    <div class="text-red-500"><i class="ri-thumb-up-line"></i></div>
                    <p class="text-gray-600 text-base">We build strong relationships</p>
                </div>
                <div class="flex gap-2">
                    <div class="text-red-500"><i class="ri-thumb-up-line"></i></div>
                    <p class="text-gray-600 text-base">
                        We encourage initiative and provide opportunity
                    </p>
                </div>
                <div class="flex gap-2">
                    <div class="text-red-500"><i class="ri-thumb-up-line"></i></div>
                    <p class="text-gray-600 text-base">
                        We embrace change and creativity
                    </p>
                </div>
                <div class="flex gap-2">
                    <div class="text-red-500"><i class="ri-thumb-up-line"></i></div>
                    <p class="text-gray-600 text-base">
                        We champion an environment of honesty
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- about us history end -->
@endsection

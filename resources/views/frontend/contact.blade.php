@extends('layouts.index');

@section('content')
    <!--breadcrums  -->
    <div class="container py-4 flex items-center gap-2">
      <a href="/" class="text-primary text-base">
        <i class="ri-home-3-line"></i>
      </a>
      <span class="text-sm text-gray-400">
        <i class="ri-arrow-right-s-line"></i>
      </span>
      <p class="text-gray-600 font-medium">Contact Us</p>
    </div>
    <!--breadcrums end  -->

    <!-- contact us -->
    <div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4">
      <!-- left -->
      <div
        class="lg:col-span-7 md:col-6 space-y-3 border border-gray-100 rounded-md shadow-md p-6"
      >
        <p class="text-xl font-medium text-gray-600 uppercase">
          leave us a message
        </p>
        <p class="text-sm text-gray-600">
          Use the form below to get in touch with the sales team
        </p>
        <div class="flex justify-between gap-4">
          <div class="w-full">
            <label
              
              class="block mb-2 text-sm font-medium text-gray-600 dark:text-white"
            >
              First Name <span class="text-red-500 ">*</span>
            </label>
            <input
              type="text"
              class="border border-gray-200 w-full rounded-md"
            />
          </div>
          <div class="w-full">
            <label
              
              class="block mb-2 text-sm font-medium text-gray-600 dark:text-white"
            >
              Last Name <span class="text-red-500">*</span>
            </label>
            <input
              type="text"
              class="border border-gray-200 w-full rounded-md"
            />
          </div>
        </div>

        <div>
          <label
              for="Email"
              class="block mb-2 text-sm font-medium text-gray-600 dark:text-white"
            >
              Email Address <span class="text-red-500">*</span>
          <input type="text" class="border border-gray-200 w-full rounded-md mt-2" />
        </div>

        <div>
          <label
          for="Email"
          class="block mb-2 text-sm font-medium text-gray-600 dark:text-white"
        >
          Subject <span class="text-red-500">*</span>
          
          <input type="text" class="border border-gray-200 w-full rounded-md mt-2" />
        </div>

        <label
          for="text"
          class="block mb-2 text-sm font-medium text-gray-600 dark:text-white"
        >
          Your message <span class="text-red-500">*</span>
          
        <textarea
          type="text"
          rows="3"
          class="block p-2.5 w-full text-sm text-gray-600 rounded-lg border border-gray-200 mt-2"
          placeholder="Write your thoughts here..."
        ></textarea>

        <button
        class="px-8 py-4 font-medium rounded-md text-white bg-primary border hover:bg-transparent hover:text-primary hover:border border-primary uppercase my-8"
      >
        send message
      </button>
      </div>
      <!-- left end -->
     
      <!-- right -->
      <div
        class="lg:col-span-5 md:col-6 space-y-4 border border-gray-100 rounded-md shadow-md p-6  "
      >
        <p class="text-medium text-gray-800 uppercase">our store</p>
        <div class="flex gap-2">
          <i class="ri-map-pin-line text-gray-600"></i>
          <p class="text-sm text-gray-600">
            7895 Dr New Albuquerue, NM 19800, nited States Of America
          </p>
        </div>
        <div class="flex gap-2">
          <i class="ri-phone-line"></i>
          <p class="text-sm text-gray-600">
            +566 477 256, +566 254 575
          </p>
        </div>
        <div class="flex gap-2">
          <i class="ri-mail-line"></i>
          <p class="text-sm text-gray-600">
           example@mail.com
          </p>
        </div>
        <p class="text-medium text-gray-800 uppercase">hours of operation</p>

        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Monday
           </p>
          <p class="text-sm text-gray-600">
           09:00 AM - 18:00 PM
          </p>
        </div>
        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Tuesday
           </p>
          <p class="text-sm text-gray-600">
           09:00 AM - 18:00 PM
          </p>
        </div>
        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Wednesday
           </p>
          <p class="text-sm text-gray-600">
           09:00 AM - 18:00 PM
          </p>
        </div>
        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Thursday
           </p>
          <p class="text-sm text-gray-600">
           09:00 AM - 18:00 PM
          </p>
        </div>
        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Friday
           </p>
          <p class="text-sm text-gray-600">
           09:00 AM - 18:00 PM
          </p>
        </div>
        <div class="flex justify-between gap-2">
          <p class="text-sm text-gray-600">
            Saturday
           </p>
          <p class="text-sm text-gray-600">
            09:00 AM - 18:00 PM
          </p>
        </div>
        <p class="text-medium text-gray-800 uppercase">careers</p>
        <p class="text-sm text-gray-600">
          If you are interesting in emplyment
opportunities at RAFCARTs. Please email us 
         </p>
         <p class="text-sm text-red-600">
          contact@mail.com
         </p>
      </div>
      <!-- right end -->
    </div>
@endsection
@extends('layouts.app')

@section('content')
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shopping Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <!-- Local Tailwind Custom CSS (replace with your local file) -->
  <link href="<?php echo asset('css/tailwind-custom.css'); ?>" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
  <!-- Local Tailwind Config (replace with your local file) -->
  <script src="<?php echo asset('js/tailwind-config.min.js'); ?>" data-color="#000000" data-border-radius="small"></script>
</head>
<div class="min-h-screen bg-gray-50">
  <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-semibold text-gray-900 mb-8">Your cart</h1>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
    <!-- Cart Items -->
    <div class="lg:col-span-8">
      <div class="space-y-6">
        <!-- Item 1 -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center gap-6">
            <div class="w-24 h-24 flex-shrink-0">
              <img src="{{ asset('storage/images/tire.jpg') }}" alt="Tire" class="w-full h-full object-contain"/>
            </div>
            <div class="flex-1">
              <p class="text-sm text-gray-500">Motoworld Philippines</p>
              <h3 class="text-lg font-medium text-gray-900">METZELER ROADTEC SCOOTER TIRE</h3>
              <div class="mt-1 flex items-center gap-2">
                <span class="text-lg font-medium text-gray-900">₱2,080.00</span>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <!-- Quantity form for Item 1 -->
              <form method="post" action="" class="flex items-center border border-gray-300 rounded-lg">
                <!-- Hidden input to identify the item -->
                <input type="hidden" name="item" value="1">
                <button type="submit" name="decrement" class="p-2 hover:bg-gray-100 rounded-l">
                  <i class="fas fa-minus text-gray-600"></i>
                </button>
                <input type="text" value="1" class="w-12 text-center border-0 focus:ring-0" readonly>
                <button type="submit" name="increment" class="p-2 hover:bg-gray-100 rounded-r">
                  <i class="fas fa-plus text-gray-600"></i>
                </button>
              </form>
              <button class="text-gray-400 hover:text-blue-500" type="button">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center gap-6">
            <div class="w-24 h-24 flex-shrink-0">
              <img src="{{ asset('storage/images/jacket.jpg') }}" alt="Jacket" class="w-full h-full object-contain"/>
            </div>
            <div class="flex-1">
              <p class="text-sm text-gray-500">Motoworld Philippines</p>
              <h3 class="text-lg font-medium text-gray-900">MACNA NOVIC MOTORCYCLE TEXTILE JACKET</h3>
              <div class="mt-1 flex items-center gap-2">
                <span class="text-lg font-medium text-gray-900">₱9,780.00</span>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <!-- Quantity form for Item 2 -->
              <form method="post" action="" class="flex items-center border border-gray-300 rounded-lg">
                <!-- Hidden input to identify the item -->
                <input type="hidden" name="item" value="2">
                <button type="submit" name="decrement" class="p-2 hover:bg-gray-100 rounded-l">
                  <i class="fas fa-minus text-gray-600"></i>
                </button>
                <input type="text" value="1" class="w-12 text-center border-0 focus:ring-0" readonly>
                <button type="submit" name="increment" class="p-2 hover:bg-gray-100 rounded-r">
                  <i class="fas fa-plus text-gray-600"></i>
                </button>
              </form>
              <button class="text-gray-400 hover:text-blue-500" type="button">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Order Summary -->
    <div class="lg:col-span-4 mt-8 lg:mt-0">
      <div class="bg-white rounded-lg shadow p-6 sticky top-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Order summary</h2>
        
        <div class="border-t border-gray-200 mt-4 pt-4">
          <p class="text-sm text-gray-500">Taxes and shipping calculated at checkout.</p>
        </div>
        <div class="border-t border-gray-200 mt-4 pt-4">
          <div class="flex items-center justify-between">
            <span class="text-base font-medium text-gray-900">Subtotal:</span>
            <span class="text-base font-medium text-gray-900">₱11,860.00</span>
          </div>
        </div>
        <button onclick="window.location.href='{{ route('checkout.view') }}'" class="w-full bg-blue-500 text-white py-3 font-semibold rounded hover:bg-blue-600">
          Checkout 
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

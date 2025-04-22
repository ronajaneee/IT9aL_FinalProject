<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#4f46e5", secondary: "#6366f1" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <style>
      body {
          background-color: #f9fafb;
          font-family: 'Inter', sans-serif;
      }
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
      input[type="number"] {
          -moz-appearance: textfield;
      }
    </style>
</head>
<body class="min-h-screen flex flex-col">
<header class="fixed w-full top-0 z-50 bg-white shadow-sm">
    <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Navigation -->
        <div class="flex items-center">
          <a href="/" class="flex-shrink-0">
          <img class="h-12 md:h-16 lg:h-20 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Under The Hood Supply"/>
          </a>
          <div class="hidden md:ml-8 md:flex md:space-x-8">
            <a href="#" class="text-blue-500 hover:text-blue-600 px-3 py-2 text-sm font-medium">Shop</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">Brands</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">Deals</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">Services</a>
          </div>
        </div>
        <!-- Middle Section: Search Bar -->
        <div class="flex-1 flex items-center justify-center px-6">
          <div class="w-full max-w-lg">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
              <input id="search" name="search" type="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search parts by vehicle, brand, or part number...">
            </div>
          </div>
        </div>
        <!-- Right Section: Account & Cart Icons -->
        <div class="flex items-center space-x-6">
            <a id="openLoginModal" href="javascript:void(0);" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-user text-xl"></i>
            </a>
            <a href="{{ route('cart') }}" class="relative text-gray-600 hover:text-gray-900">
                <i class="fas fa-shopping-cart text-xl"></i>
                <span class="absolute -top-1 -right-1 h-4 w-4 text-xs bg-blue-500 text-white rounded-full flex items-center justify-center">2</span>
            </a>
        </div>
      </div>
    </nav>
  </header>  
  <main class="flex-grow pt-32 pb-40">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-3xl font-semibold text-gray-900 mb-8">Your cart</h1>
      <div class="lg:grid lg:grid-cols-3 lg:gap-8">
        <div class="lg:col-span-2 space-y-6">
          @if(count($cartItems) > 0)
            @foreach($cartItems as $cartItem)
              <div class="bg-white rounded shadow-sm p-6">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                  <div class="w-24 h-24 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('storage/images/rim.avif') }}" alt="Motorcycle Tire" class="object-cover w-full h-full"/>
                  </div>
                  <div class="flex-grow">
                    <div class="text-sm text-gray-500">Motoworld Philippines</div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $cartItem->product->name }}</h3>
                    <div class="text-lg font-semibold text-gray-900 mt-1">{{ $cartItem->product->price }}</div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <form method="POST" action="{{ route('cart.update', $cartItem->id) }}" class="flex items-center border border-gray-300 rounded-button">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="action" value="decrement"/>
                      <button class="w-8 h-8 flex items-center justify-center hover:bg-gray-50">
                        <i class="ri-subtract-line"></i>
                      </button>
                      <input type="number" name="quantity" value="{{ $cartItem->quantity }}" class="w-12 h-8 text-center border-none bg-gray-100 rounded-button text-gray-900" min="1"/>
                      <input type="hidden" name="action" value="increment"/>
                      <button class="w-8 h-8 flex items-center justify-center hover:bg-gray-50">
                        <i class="ri-add-line"></i>
                      </button>
                    </form>
                    <form method="POST" action="{{ route('cart.remove', $cartItem->id) }}">
                      @csrf
                      @method('DELETE')
                      <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-red-500">
                        <i class="ri-delete-bin-line"></i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p>Your cart is empty.</p>
          @endif
          <!-- Continue Shopping Button -->
          <div class="mt-6">
            <a href="{{ route('welcome') }}" class="inline-flex items-center text-primary hover:text-primary-dark">
              <i class="ri-arrow-left-line mr-2"></i>
              Continue shopping
            </a>
          </div>
        </div>
        <!-- Order Summary -->
        <div class="mt-8 lg:mt-0">
          <div class="bg-white rounded shadow-sm p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Order summary</h2>
            <div class="text-sm text-gray-500 mb-6">Taxes and shipping calculated at checkout.</div>
            <div class="border-t border-gray-200 pt-4 mb-6">
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">Subtotal</span>
                <span class="text-lg font-semibold text-gray-900">₱11,860.00</span>
              </div>
            </div>
            <button onclick="window.location.href='{{ route('checkout.view') }}'" class="bg-primary text-white py-3 px-6 rounded-button flex items-center justify-center whitespace-nowrap hover:bg-opacity-90 transition-colors w-full">
              <i class="ri-flash-line mr-2"></i>
              Checkout
            </button>
            <div class="mt-6">
              <div class="flex items-center justify-center space-x-4 text-gray-500 text-sm">
                <div class="flex items-center">
                  <i class="ri-shield-check-line mr-1"></i>
                  Secure checkout
                </div>
                <div class="flex items-center">
                  <i class="ri-truck-line mr-1"></i>
                  Fast delivery
                </div>
              </div>
              <div class="flex justify-center mt-4 space-x-3">
                <i class="ri-visa-fill ri-lg text-gray-600"></i>
                <i class="ri-mastercard-fill ri-lg text-gray-600"></i>
                <i class="ri-paypal-fill ri-lg text-gray-600"></i>
                <i class="ri-bank-card-fill ri-lg text-gray-600"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-gray-900 mt-48">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <img class="h-28 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Under The Hood Supply"/>
          <p class="mt-4 text-gray-400 text-sm">Premium automotive parts and accessories for enthusiasts and professionals.</p>
        </div>
        <div>
          <h3 class="text-white font-medium mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">About Us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Contact</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Blog</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">FAQs</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-white font-medium mb-4">Customer Service</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Shipping Policy</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Returns</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Order Status</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Payment Methods</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-white font-medium mb-4">Newsletter</h3>
          <p class="text-gray-400 text-sm mb-4">Subscribe to receive updates, access to exclusive deals, and more.</p>
          <form class="flex">
            <input type="email" class="flex-1 bg-gray-800 text-white px-4 py-2 !rounded-button border-0 focus:ring-2 focus:ring-custom" placeholder="Enter your email"/>
            <button type="submit" class="ml-2 bg-custom text-white px-4 py-2 !rounded-button hover:bg-custom/90">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-8">
        <div class="flex justify-between items-center">
          <p class="text-gray-400 text-sm">© 2025 R&R Corp. All rights reserved.</p>
          <div class="flex space-x-6">
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  @include('auth.login')
</body>
</html>

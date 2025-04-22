<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-100">
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
            <!-- Cart Button opens the cart modal -->
            <a href="{{ route('cart') }}" class="relative text-gray-600 hover:text-gray-900">
                <i class="fas fa-shopping-cart text-xl"></i>
                <span class="absolute -top-1 -right-1 h-4 w-4 text-xs bg-blue-500 text-white rounded-full flex items-center justify-center">2</span>
            </a>
        </div>
      </div>
    </nav>
  </header>

    <main class="mt-16">
        <section class="relative bg-gray-900 h-[600px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="storage/images/background.webp" class="w-full h-full object-cover object-center" alt="Hero Background"/>
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-transparent opacity-90"></div>
            </div>
            <div class="relative max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                <div class="max-w-2xl">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Welcome to UnderTheHood Supply
                    </h1>
                    <p class="mt-6 text-xl text-gray-300 max-w-xl">
                        Discover our extensive collection of high-quality automotive parts and accessories. Engineered for excellence, designed for your vehicle.
                    </p>
                    <div class="mt-10 flex space-x-4">
                        <button onclick="document.getElementById('products').scrollIntoView({ behavior: 'smooth' });" class="bg-white text-gray-900 px-8 py-3 !rounded-button hover:bg-gray-100 font-medium">
                            Shop Now
                        </button>
                        <button class="bg-white text-gray-900 px-8 py-3 !rounded-button hover:bg-gray-100 font-medium">
                            Find Parts
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section id="products" class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl font-semibold text-gray-900 mb-8">Popular Categories</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        
        <!-- Engine Parts -->
        <div class="group">
            <a href="{{ route('product') }}">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/engine.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Engine Parts" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Engine Parts</h3>
            </a>
                    </div>

        <!-- Interior -->
        <div class="group">
            <a href="#">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/interior.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Interior" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Interior</h3>
            </a>
            <div class="mt-2">
                <a href="{{ route('product') }}" class="text-purple-600 font-medium hover:underline inline-block">
                    View
                </a>
            </div>
        </div>

        <!-- Transmission -->
        <div class="group">
            <a href="#">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/transmission.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Transmission" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Transmission</h3>
            </a>
            <div class="mt-2">
            <a href="{{ route('product') }}" class="text-purple-600 font-medium hover:underline inline-block">
                    View
                </a>
            </div>
        </div>

        <!-- Suspension -->
        <div class="group">
            <a href="#">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/suspension.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Suspension" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Suspension</h3>
            </a>
            <div class="mt-2">
            <a href="{{ route('product') }}" class="text-purple-600 font-medium hover:underline inline-block">
                    View
                </a>
            </div>
        </div>

        <!-- Wheel Rim -->
        <div class="group">
            <a href="#">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/rim.avif" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Wheel Rim" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Wheel Rim</h3>
            </a>
            <div class="mt-2">
                <a href="{{ route('product') }}" class="text-purple-600 font-medium hover:underline inline-block">
                    View
                </a>
            </div>
        </div>

        <!-- Interior -->
        <div class="group">
            <a href="#">
                <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                    <img src="storage/images/interior.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Interior" />
                </div>
                <h3 class="mt-4 text-base font-medium text-gray-900">Interior</h3>
            </a>
            <div class="mt-2">
                <a href="#" class="text-purple-600 font-medium hover:underline inline-block">
                    View
                </a>
            </div>
        </div>

    </div>
</section>

        
       <section class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-900">Featured Products</h2>
        <a href="#" class="text-purple-600 font-medium hover:underline">View All →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <!-- Product Card -->
        <div class="relative group rounded-xl border bg-white p-4 shadow-sm hover:shadow-md transition">
            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}"
                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="mt-4 space-y-1">
                <h3 class="text-base font-semibold text-gray-900">{{ $product->name }}</h3>
                <p class="text-sm text-gray-500">{{ $product->description }}</p>
                <div class="flex items-center space-x-1 text-yellow-400 text-sm">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="text-gray-500 ml-1">(42)</span>
                </div>
                <p class="text-lg font-bold text-gray-900">{{ $product->price }}</p>
                <a href="{{ route('product.show', ['ProductID' => $product->id]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
            </div>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="absolute bottom-4 right-4 bg-purple-600 hover:bg-purple-700 text-white p-2 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.85-1.53L17 13M10 21h.01M14 21h.01" />
                </svg>
            </button>
            </form>
        </div>
        @endforeach
    </div>
</section>


        <section class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-8">
        <h2 class="text-3xl font-semibold text-gray-900 mb-8">Featured Brands</h2>
    </div>
    <div class="overflow-hidden relative">
        <div class="flex gap-8 animate-slide whitespace-nowrap">
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/Enkei-logo.png') }}" alt="Wheel Rim" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/mercedez.webp') }}" alt="Mercedez Benz" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/toyoya.webp') }}" alt="Toyota" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/bilstein.webp') }}" alt="Bilstein" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/ZF.webp') }}" alt="Zf" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-center hover:shadow-md transition-shadow min-w-[200px]">
                <img src="{{ asset('storage/images/brembo.webp') }}" alt="Brembo" class="h-28 object-contain grayscale hover:grayscale-0 transition-all"/>
            </div>
        </div>
    </div>
</section>
        <section class="bg-white py-16">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <h2 class="text-3xl font-semibold text-gray-900">Our Locations</h2>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-medium text-gray-900">Main Store</h3>
                                <p class="text-gray-600">123 Auto Parts Street<br/>Los Angeles, CA 90001<br/>Phone: (555) 123-4567</p>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium text-gray-900">Service Center</h3>
                                <p class="text-gray-600">456 Mechanic Avenue<br/>Los Angeles, CA 90002<br/>Phone: (555) 987-6543</p>
                            </div>
                        </div>
                    </div>
                    <div class="h-96 bg-gray-200 rounded-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27405770525!2d-118.69192113701541!3d34.02016130653294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA!5e0!3m2!1sen!2sus!4v1656541745051!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-100 py-16">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <i class="fas fa-truck text-4xl text-custom mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900">Free Shipping</h3>
                        <p class="mt-2 text-sm text-gray-500">On orders over $99</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-shield-alt text-4xl text-custom mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900">Secure Payment</h3>
                        <p class="mt-2 text-sm text-gray-500">100% secure payment</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-undo text-4xl text-custom mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900">Easy Returns</h3>
                        <p class="mt-2 text-sm text-gray-500">30 day return policy</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-headset text-4xl text-custom mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900">24/7 Support</h3>
                        <p class="mt-2 text-sm text-gray-500">Dedicated support</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-gray-900">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <!-- Image here -->
                    <img class="h-28 w-auto" src="storage/images/logo.png" alt="Under The Hood Supply"/>
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
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover

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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
  <header class="fixed w-full top-0 z-50 bg-white shadow-sm">
    <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Navigation -->
        <div class="flex items-center">
          <a href="/" class="flex-shrink-0">
          <img class="h-14 w-auto ml-4" src="{{ asset('storage/images/logo.webp') }}" alt="Under The Hood Supply"/>
          </a>
          <div class="hidden md:ml-8 md:flex md:space-x-8">
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'text-blue-500' : 'text-gray-600' }} hover:text-blue-600 px-3 py-2 text-sm font-medium">Shop</a>
            <a href="#featured-brands" onclick="event.preventDefault(); document.getElementById('featured-brands').scrollIntoView({ behavior: 'smooth' });" class="{{ request()->segment(1) == 'brands' ? 'text-blue-500' : 'text-gray-600' }} hover:text-blue-600 px-3 py-2 text-sm font-medium">Brands</a>
          </div>
        </div>
        <!-- Middle Section: Search Bar -->
        <div class="flex-1 flex items-center justify-center px-6">
          <div class="w-full max-w-lg">
            <label for="search" class="sr-only">Search</label>
            <form action="{{ route('products.search') }}" method="GET">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input id="search" 
                           name="search" 
                           type="search" 
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                           placeholder="Search parts by vehicle, brand, or part number..."
                           value="{{ request('search') }}">
                </div>
            </form>
          </div>
        </div>
        <!-- Right Section: Account & Cart Icons -->
        <div class="flex items-center space-x-6">
            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-1 text-gray-600 hover:text-gray-900">
                        <i class="fas fa-user text-xl"></i>
                        <span class="text-sm font-medium">{{ Auth::user()->first_name }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open"
                         @click.outside="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('account.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Account</a>
                        <a href="{{ route('cart.view') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Orders</a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a id="openLoginModal" href="javascript:void(0);" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-user text-xl"></i>
                </a>
            @endauth

            <!-- Cart dropdown - Moved outside auth check -->
            <div class="relative" x-data="{ cartOpen: false }">
                <button @click="cartOpen = !cartOpen" class="relative text-gray-600 hover:text-gray-900">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="absolute -top-1 -right-1 h-4 w-4 text-xs bg-blue-500 text-white rounded-full flex items-center justify-center">
                        {{ \App\Facades\Cart::count() }}
                    </span>
                </button>
                <div x-show="cartOpen"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     @click.outside="cartOpen = false"
                     class="absolute right-0 mt-2 w-96 bg-white rounded-lg shadow-lg py-2">
                    <div class="px-4 py-2 border-b">
                        <h3 class="text-lg font-medium">Shopping Cart</h3>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        @if(\App\Facades\Cart::count() > 0)
                            @foreach(\App\Facades\Cart::content() as $item)
                                <div class="flex items-center px-4 py-3 hover:bg-gray-50 border-b">
                                    <img src="{{ asset('storage/images/' . ($item->options->image ?? 'default.jpg')) }}" 
                                         alt="{{ $item->name }}" 
                                         class="h-16 w-16 object-cover rounded">
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $item->name }}</p>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->qty }}</p>
                                        <p class="text-sm font-medium text-gray-900">₱{{ number_format($item->price, 2) }}</p>
                                    </div>
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <div class="px-4 py-3 text-gray-500 text-center">
                                Your cart is empty
                            </div>
                        @endif
                    </div>
                    <div class="px-4 py-2 border-t">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-medium">Total:</span>
                            <span class="text-lg font-bold">₱{{ number_format(\App\Facades\Cart::total(), 2) }}</span>
                        </div>
                        
                        <div class="space-y-2">
                            <a href="{{ route('cart.view') }}" class="block w-full bg-blue-500 text-white text-center px-4 py-2 rounded-button hover:bg-blue-600">
                                View Cart
                            </a>
                            @if(!\App\Facades\Cart::count() > 0)
                                <p class="text-sm text-gray-500 text-center">Your cart is empty</p>
                            @elseif(!Auth::check())
                                <p class="text-sm text-gray-500 text-center">You'll need to 
                                    <button type="button" 
                                            class="text-blue-500 hover:text-blue-700 openLoginModal"
                                            data-return-url="{{ url()->current() }}">
                                        login
                                    </button> 
                                    to checkout
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
                        <a href="{{ route('products.index') }}" class="bg-white text-gray-900 px-8 py-3 !rounded-button hover:bg-gray-100 font-medium inline-block">
                        Find Parts
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="products" class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl font-semibold text-gray-900 mb-8">Popular Categories</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        <!-- Engine Parts -->
        <a href="{{ route('products.category', ['category' => 'engine']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/engine.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Engine Parts" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Engine Parts</h3>
        </a>

        <!-- Brakes -->
        <a href="{{ route('products.category', ['category' => 'brakes']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/interior.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Interior" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Interior</h3>
        </a>

        <!-- Transmission -->
        <a href="{{ route('products.category', ['category' => 'transmission']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/transmission.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Transmission" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Transmission</h3>
        </a>

        <!-- Suspension -->
        <a href="{{ route('products.category', ['category' => 'suspension']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/suspension.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Suspension" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Suspension</h3>
        </a>

        <!-- Wheel Rim -->
        <a href="{{ route('products.category', ['category' => 'wheel']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/rim.avif" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Wheel Rim" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Wheel Rim</h3>
        </a>

        <!-- Interior -->
        <a href="{{ route('products.category', ['category' => 'interior']) }}" class="group block transition hover:shadow-lg rounded-lg">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                <img src="storage/images/interior.webp" class="object-center object-cover group-hover:scale-105 transition-transform duration-300" alt="Interior" />
            </div>
            <h3 class="mt-4 text-base font-medium text-gray-900">Interior</h3>
        </a>
    </div>
</section>

        
       <section class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-900">Featured Products</h2>
        <a href="#" class="text-purple-600 font-medium hover:underline">View All →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products->take(4) as $product)
        <!-- Product Card -->
        <a href="{{ route('products.show', ['ProductID' => $product->ProductID]) }}" class="relative group rounded-xl border bg-white p-4 shadow-sm hover:shadow-md transition block">
            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-100">
                <img src="{{ asset('storage/images/' . $product->Image) }}" alt="{{ $product->ProductName }}"
                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="mt-4 space-y-1">
                <h3 class="text-base font-semibold text-gray-900">{{ $product->ProductName }}</h3>
                <p class="text-sm text-gray-500">{{ $product->Description }}</p>
                <div class="flex items-center space-x-1 text-yellow-400 text-sm">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="text-gray-500 ml-1">(42)</span>
                </div>
                <p class="text-lg font-bold text-gray-900">₱{{ number_format($product->Price, 2) }}</p>
            </div>
            <form action="{{ route('cart.add') }}" method="POST" class="absolute bottom-4 right-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->ProductID }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" 
                        class="bg-purple-600 hover:bg-purple-700 text-white p-2 rounded-full shadow"
                        onclick="event.preventDefault(); 
                                 this.closest('form').submit();
                                 document.querySelector('[x-data]').__x.$data.cartOpen = true;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.85-1.53L17 13M10 21h.01M14 21h.01" />
                    </svg>
                </button>
            </form>
        </a>
        @endforeach
    </div>
</section>


        <section id="featured-brands" class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
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
                    <img class="h-14 w-auto ml-4" src="{{ asset('storage/images/logo.webp') }}" alt="Under The Hood Supply"/>
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
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Include Login Modal -->
    @include('auth.login')

    <!-- Modal Toggle Script --> 
    <script>
        // Get all elements with openLoginModal class
        const openLoginButtons = document.querySelectorAll('.openLoginModal, #openLoginModal');
        const loginModal = document.getElementById('loginModal');
        const closeLoginModal = document.getElementById('closeLoginModal');
        const registerModal = document.getElementById('registerModal');
        const loginForm = document.getElementById('login-form');

        // Add click event listener to all login buttons
        openLoginButtons.forEach(button => {
            button.addEventListener('click', () => {
                loginModal.classList.remove('hidden');
            });
        });

        // Close modal when clicking close button
        if (closeLoginModal) {
            closeLoginModal.addEventListener('click', () => {
                loginModal.classList.add('hidden');
            });
        }

        // Check for login errors and show modal if needed
        @if($errors->has('keepModalOpen') || session('openLogin'))
            loginModal.classList.remove('hidden');
            if (registerModal) {
                registerModal.classList.add('hidden');
            }
        @endif
    </script>
</body>
</html>

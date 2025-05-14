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
<body class="bg-gray-100 flex flex-col min-h-screen">
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

    <main class="flex-grow pt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-8">Shopping Cart</h1>
                @if(isset($cartItems) && $cartItems->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                            <div class="py-6 flex items-center">
                                <img src="{{ asset('storage/images/' . ($item->options->image ?? 'default.jpg')) }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-24 h-24 object-cover rounded"/>
                                <div class="ml-6 flex-1">
                                    <h3 class="text-lg font-medium">{{ $item->name }}</h3>
                                    <p class="text-gray-500">₱{{ number_format($item->price, 2) }}</p>
                                    <div class="flex items-center mt-4">
                                        <div class="flex items-center border rounded">
                                            <!-- Decrement button with separate form -->
                                            <form method="POST" action="{{ route('cart.update', $item->rowId) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="qty" value="{{ $item->qty - 1 }}">
                                                <button type="submit" 
                                                        class="px-4 py-2 hover:bg-gray-200 focus:outline-none"
                                                        {{ $item->qty <= 1 ? 'disabled' : '' }}>-</button>
                                            </form>
                                            
                                            <span class="px-4 py-2 border-x">{{ $item->qty }}</span>
                                            
                                            <!-- Increment button with separate form -->
                                            <form method="POST" action="{{ route('cart.update', $item->rowId) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="qty" value="{{ $item->qty + 1 }}">
                                                <button type="submit" 
                                                        class="px-4 py-2 hover:bg-gray-200 focus:outline-none">+</button>
                                            </form>
                                        </div>
                                        <form method="POST" action="{{ route('cart.remove', $item->rowId) }}" class="ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="ml-6">
                                    <p class="text-lg font-medium">₱{{ number_format($item->qty * $item->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8 border-t pt-8">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-medium">Subtotal</p>
                            <p class="text-2xl font-bold">₱{{ number_format($total, 2) }}</p>
                        </div>
                        <button onclick="window.location.href='{{ route('checkout.view') }}'"
                                class="mt-8 w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                            Proceed to Checkout
                        </button>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Your cart is empty</p>
                    </div>
                @endif
                <a href="{{ route('products.index') }}" 
                   class="mt-6 inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
    </main>
    <footer class="bg-gray-900 mt-auto">
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

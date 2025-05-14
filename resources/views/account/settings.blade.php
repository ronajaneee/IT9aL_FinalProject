<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>My Account - UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutButton = document.querySelector('[data-checkout-button]');
            if (checkoutButton) {
                checkoutButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    fetch('{{ route('checkout.process') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('orderConfirmationModal').classList.remove('hidden');
                        }
                    });
                });
            }

            document.getElementById('closeConfirmationModal').addEventListener('click', function() {
                document.getElementById('orderConfirmationModal').classList.add('hidden');
                window.location.href = '{{ route('welcome') }}';
            });
        });
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    
    <main class="container mx-auto px-4 py-20">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-lg shadow">
                <!-- Account Header -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-900">My Account</h1>
                </div>

                <!-- Account Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Sidebar Navigation -->
                        <div class="md:col-span-1">
<nav class="space-y-1 shadow">
                                <a href="#profile" class="block px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-medium hover:bg-gray-100">Profile</a>
                                <a href="#orders" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-blue-600">Order History</a>
                    
                            </nav>
                        </div>

                        <!-- Main Content Area -->
                        <div class="md:col-span-2">
                            <!-- Profile Section -->
<div id="profile" class="space-y-6">
                                @if (session('success'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <span class="block sm:inline">{{ session('success') }}</span>
                                    </div>
                                @endif
                                <div class="bg-gray-50 rounded-lg p-6 shadow">
                                    <h2 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h2>
                                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="tel" name="phone" value="{{ Auth::user()->phone }}" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-button hover:bg-blue-700">
                                            Save Changes
                                        </button>
                                    </form>
                                </div>

                                <!-- Order History -->
                                <div id="orders" class="bg-gray-50 rounded-lg p-6 shadow">
                                    <h2 class="text-lg font-medium text-gray-900 mb-4">Order History</h2>
                                    @if($orders->count() > 0)
                                        <div class="space-y-4">
                                            @foreach($orders as $order)
                                            <div class="border border-gray-200 rounded-lg p-4">
                                                <div class="flex justify-between items-center mb-4">
                                                    <div>
                                                        <h3 class="text-sm font-medium">Order #{{ $order->id }}</h3>
                                                        <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                                                        @if($order->status === 'completed') bg-green-100 text-green-800
                                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                        @else bg-gray-100 text-gray-800 @endif">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </div>
                                                <div class="space-y-2">
                                                    @foreach($order->items as $item)
                                                    <div class="flex items-center">
                                                        <img src="{{ asset('storage/images/' . $item->product->Image) }}" 
                                                             alt="{{ $item->product->ProductName }}" 
                                                             class="h-16 w-16 object-cover rounded">
                                                        <div class="ml-4">
                                                            <p class="text-sm font-medium">{{ $item->product->ProductName }}</p>
                                                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                                            <p class="text-sm font-medium">₱{{ number_format($item->price, 2) }}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="mt-4 pt-4 border-t border-gray-200">
                                                    <div class="flex justify-between">
                                                        <span class="text-sm font-medium">Total</span>
                                                        <span class="text-sm font-bold">₱{{ number_format($order->total, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-gray-500 text-center py-4">No orders found</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('checkout.confirmation-modal')
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
    <!-- Order Confirmation Modal -->
    <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="text-center">
                    <i class="fas fa-check-circle text-green-500 text-5xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Order Placed Successfully!</h3>
                    <p class="text-gray-600 mb-4">Thank you for your purchase.</p>
                    <button id="closeModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Continue Shopping
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function processCheckout() {
            fetch('{{ route('checkout.process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Error processing order');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error processing order. Please try again.');
            });
        }

        $(document).ready(function() {
            $('#placeOrderBtn').click(function() {
                $.ajax({
                    url: '{{ route("checkout.process") }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#orderModal').removeClass('hidden');
                            setTimeout(function() {
                                window.location.href = '{{ route("welcome") }}';
                            }, 3000);
                        }
                    },
                    error: function(xhr) {
                        alert('Error processing order. Please try again.');
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#closeModal').click(function() {
                $('#orderModal').addClass('hidden');
                window.location.href = '{{ route("welcome") }}';
            });
        });
    </script>
</body>
</html>

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
</head>
<body class="bg-gray-100">
    @include('partials.header')
    
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
                            <nav class="space-y-1">
                                <a href="#profile" class="block px-4 py-2 rounded-lg bg-gray-50 text-blue-600 font-medium">Profile</a>
                                <a href="#orders" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-blue-600">Order History</a>
                    
                            </nav>
                        </div>

                        <!-- Main Content Area -->
                        <div class="md:col-span-2">
                            <!-- Profile Section -->
                            <div id="profile" class="space-y-6">
                                <div class="bg-gray-50 rounded-lg p-6">
                                    <h2 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h2>
                                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                                <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="mt-1 block w-full rounded-button border-gray-300">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="mt-1 block w-full rounded-button border-gray-300">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full rounded-button border-gray-300">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="tel" name="phone" value="{{ Auth::user()->phone }}" class="mt-1 block w-full rounded-button border-gray-300">
                                        </div>
                                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-button hover:bg-blue-700">
                                            Save Changes
                                        </button>
                                    </form>
                                </div>

                                <!-- Order History -->
                                <div id="orders" class="bg-gray-50 rounded-lg p-6">
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
  
</body>
</html>

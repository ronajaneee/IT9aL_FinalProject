<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnderTheHood</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#3b82f6',secondary:'#f59e0b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <style>
        .bg-secondary { background-color:rgba(160, 5, 207, 0.9); }
        .hover\:bg-secondary\/90:hover { background-color: rgba(76, 3, 99, 0.9); }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <!-- Add this style block for custom radio/checkbox styles -->
    <style>
        input[type="radio"]:checked + div + div,
        input[type="checkbox"]:checked + div + div {
            opacity: 1;
            transform: scale(1);
        }
        
        input[type="radio"]:checked + div,
        input[type="checkbox"]:checked + div {
            border-color: #3b82f6;
        }
    </style>
    <style>
        input[type="radio"]:checked + div + div,
        input[type="checkbox"]:checked + div + div {
            opacity: 1;
            transform: scale(1);
            background-color: #000000;
        }
        
        input[type="radio"]:checked + div,
        input[type="checkbox"]:checked + div {
            border-color: #000000;
        }
    </style>
</head>
<body class="bg-gray-100">
      <!-- Header Section -->
  <header class="fixed w-full top-0 z-50 bg-white shadow-sm">
    <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Navigation -->
        <div class="flex items-center">
          <a href="" class="flex-shrink-0">
          <img class="h-14 w-auto ml-4" src="{{ asset('storage/images/logo.webp') }}" alt="Under The Hood Supply"/>
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
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75" 
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         @click.outside="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Account</a>
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
            <!-- Cart link -->
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
                        <a href="{{ route('cart.view') }}" class="block w-full bg-blue-500 text-white text-center px-4 py-2 rounded-button hover:bg-blue-600">
                            View Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </nav>
  </header>

        <main class="container mx-auto px-4 py-20">
            <!-- Back button -->
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 mb-6 text-gray-600 hover:text-gray-900">
    <i class="fas fa-arrow-left"></i>
    <span>Back to Home</span>
</a>


            
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="w-full md:w-64 shrink-0">
                <div class="bg-white p-6 rounded shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Filter</h2>
                    
                    {{-- 
                        NOTE: Filtering works only if your controller (e.g., ProductController@index) 
                        reads the request parameters (category, manufacturers, min_price, max_price) 
                        and queries the database accordingly. 
                        This Blade file only displays the $products variable passed from the controller.
                    --}}
                    <form id="filterForm" method="GET" action="{{ route('products.index') }}" class="space-y-6">
    <!-- Categories -->
    <div class="mb-6">
        <h3 class="font-semibold mb-3">Categories</h3>
        <div class="space-y-2">
            @foreach(['Engine Parts', 'Brake Systems', 'Transmission', 'Suspension', 'Wheel Rim', 'Interior'] as $category)
                <label class="flex items-center cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                        <input type="radio" 
                               name="category" 
                               value="{{ Str::slug($category) }}" 
                               class="opacity-0 absolute w-full h-full cursor-pointer z-10"
                               {{ request('category') == Str::slug($category) ? 'checked' : '' }}
                               onchange="this.form.submit()">
                        <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                    </div>
                    <span>{{ $category }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <!-- Manufacturers -->
    <div class="mb-6">
        <h3 class="font-semibold mb-3">Manufacturer</h3>
        <div class="space-y-2">
            @foreach(['Bilstein', 'Brembo', 'Enkie', 'Mercedez', 'Toyota', 'ZF'] as $manufacturer)
                <label class="flex items-center cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                        <input type="checkbox" 
                               name="manufacturers[]" 
                               value="{{ $manufacturer }}"
                               class="opacity-0 absolute w-full h-full cursor-pointer z-10"
                               {{ in_array($manufacturer, (array)request('manufacturers')) ? 'checked' : '' }}
                               onchange="this.form.submit()">
                        <div class="w-5 h-5 border border-gray-300 rounded"></div>
                        <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                    </div>
                    <span>{{ $manufacturer }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <!-- Price Range -->
    <div class="mb-6">
        <h3 class="font-semibold mb-3">Price Range</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <input type="number" 
                       name="min_price" 
                       placeholder="Min" 
                       class="w-24 px-3 py-2 border border-gray-200 rounded text-sm"
                       value="{{ request('min_price') }}">
                <span class="text-gray-400">-</span>
                <input type="number" 
                       name="max_price" 
                       placeholder="Max" 
                       class="w-24 px-3 py-2 border border-gray-200 rounded text-sm"
                       value="{{ request('max_price') }}">
            </div>
            <button type="submit" 
                    class="bg-primary text-white w-full py-2 rounded-button font-medium hover:bg-primary/90 transition-colors">
                Apply Filter
            </button>
        </div>
    </div>
</form>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Sorting and View Options -->
                <div class="bg-white p-4 rounded shadow-sm flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <button class="flex items-center space-x-2 px-4 py-2 border border-gray-200 rounded-button whitespace-nowrap">
                            <i class="ri-filter-3-line"></i>
                            <span>Filter</span>
                        </button>
                        
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 px-4 py-2 border border-gray-200 rounded-button whitespace-nowrap">
                                <span>Sort by: Featured</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75" 
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 @click.outside="open = false"
                                 class="absolute top-full left-0 mt-1 bg-white border border-gray-200 rounded shadow-lg w-48 z-10">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Featured</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Price: Low to High</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Price: High to Low</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Newest</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Best Selling</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">View as:</span>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-primary">
                            <i class="ri-list-check"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-primary bg-primary/10 text-primary">
                            <i class="ri-grid-line"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <!-- Product Card -->
                    <div class="bg-white rounded shadow-sm overflow-hidden group hover:shadow-lg transition-shadow">
                        <a href="{{ route('products.show', ['ProductID' => $product->ProductID]) }}" class="block">
                            <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                                <img src="{{ asset('storage/images/' . $product->Image) }}" alt="{{ $product->ProductName }}" class="object-contain h-full">
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold group-hover:text-primary transition-colors">{{ $product->ProductName }}</h3>
                                <p class="text-gray-600 text-sm mb-2">{{ $product->Description }}</p>
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-sm text-gray-500 ml-2">4.5 (28 Reviews)</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-xl font-bold">₱{{ number_format($product->Price, 2) }}</span>
                                    <form action="{{ route('cart.add') }}" method="POST" class="inline-flex space-x-2" onclick="event.stopPropagation();">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->ProductID }}">
                                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">
                                            Add to Cart
                                        </button>
                                        <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
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
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    @include('auth.login')
    <script>
        // Add this before the existing script
        function handleFilterChange(element) {
            const type = element.type;
            const name = element.name;
            const value = element.value;
            
            // If it's a radio button, uncheck others in the same group
            if (type === 'radio') {
                document.querySelectorAll(`input[name="${name}"]`).forEach(input => {
                    const indicator = input.nextElementSibling.nextElementSibling;
                    if (input !== element) {
                        indicator.style.opacity = '0';
                        indicator.style.transform = 'scale(0)';
                    }
                });
            }
            
            // Show the selected indicator
            const indicator = element.nextElementSibling.nextElementSibling;
            if (element.checked) {
                indicator.style.opacity = '1';
                indicator.style.transform = 'scale(1)';
            } else {
                indicator.style.opacity = '0';
                indicator.style.transform = 'scale(0)';
            }
            
            // Here you can add AJAX call to filter products
            // For example:
            // fetchFilteredProducts({ [name]: value });
        }

        function fetchFilteredProducts(filters) {
            // Add your AJAX logic here to fetch filtered products
            console.log('Filtering products with:', filters);
        }

        // Existing modal scripts...
        const openLoginModal = document.getElementById('openLoginModal');
        const loginModal = document.getElementById('loginModal');
        const closeLoginModal = document.getElementById('closeLoginModal');

        openLoginModal.addEventListener('click', () => {
            loginModal.classList.remove('hidden');
        });

        closeLoginModal.addEventListener('click', () => {
            loginModal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content
        document.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });

        // Function to toggle the cart modal
        function toggleCartModal() {
            const cartModal = document.getElementById('cartModal');
            const cartContent = document.getElementById('cartContent');

            if (cartModal.classList.contains('hidden')) {
                // Load the cart content dynamically
                fetch('{{ route('cart.modal') }}')
                    .then(response => response.text())
                    .then(html => {
                        cartContent.innerHTML = html;
                        cartModal.classList.remove('hidden');
                    })
                    .catch(error => console.error('Error loading cart content:', error));
            } else {
                cartModal.classList.add('hidden');
            }
        }

        // Remove AJAX applyFilters and related code, as we now use form submission.
        // Keep only the code for initializing radio/checkbox indicators:
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('input[type="radio"], input[type="checkbox"]');
            inputs.forEach(input => {
                const indicator = input.nextElementSibling.nextElementSibling;
                if (input.checked) {
                    indicator.style.opacity = '1';
                    indicator.style.transform = 'scale(1)';
                }
            });
        });
    </script>

</body>
</html>
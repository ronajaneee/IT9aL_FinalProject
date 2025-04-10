<?php
session_start();

// Initialize quantity if not set
if (!isset($_SESSION['quantity'])) {
    $_SESSION['quantity'] = 1;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['increment'])) {
        $_SESSION['quantity'] = (int) $_SESSION['quantity'] + 1;
    } elseif (isset($_POST['decrement'])) {
        if ((int) $_SESSION['quantity'] > 1) {
            $_SESSION['quantity'] = (int) $_SESSION['quantity'] - 1;
        }
    }
}
$quantity = $_SESSION['quantity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-100">
      <!-- Header Section -->
  <header class="fixed w-full top-0 z-50 bg-white shadow-sm">
    <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Navigation -->
        <div class="flex items-center">
          <a href="/" class="flex-shrink-0">
            <img class="h-28 w-auto" src="{{ asset('storage/images/logo.webp') }}" alt="Under The Hood Supply"/>
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
        </div>
      </div>
    </nav>
  </header>
  <!-- Cart Modal (Overlay) - Initially Hidden -->  
<div id="cartModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-xl rounded-lg shadow-xl">
        <div class="flex items-center justify-between p-4 border-b">
            <h2 class="text-lg font-semibold">Your Cart</h2>
            <button onclick="toggleCartModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        <div id="cartContent" class="p-4" style="min-height: 300px; overflow-y: auto;">
            <!-- Cart content will be dynamically loaded here -->
        </div>
    </div>
</div>
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
            <div class="flex flex-col">
                <div class="aspect-w-16 aspect-h-9 rounded-lg bg-gray-100 overflow-hidden">
                    <!-- Replace AI-generated product image with your local product image or a proper placeholder -->
                    <img src="<?php echo 'storage/images/rim.avif'; ?>" alt="Main product image" class="object-cover object-center"/>
                </div>
                <div class="mt-4 grid grid-cols-4 gap-4">
                    <!-- Replace AI-generated thumbnail images with your local alternatives -->
                    <button class="relative aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="<?php echo 'storage/images/rim.avif'; ?>" alt="Thumbnail 1" class="object-cover object-center"/>
                    </button>
                    <button class="relative aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="<?php echo 'storage/images/rim.avif'; ?>" alt="Thumbnail 2" class="object-cover object-center"/>
                    </button>
                    <button class="relative aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="<?php echo 'storage/images/rim.avif'; ?>" alt="Thumbnail 3" class="object-cover object-center"/>
                    </button>
                    <button class="relative aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="<?php echo 'storage/images/rim.avif'; ?>" alt="Thumbnail 4" class="object-cover object-center"/>
                    </button>
                </div>
            </div>
            <div class="mt-10 px-4 sm:px-0 lg:mt-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product['name'] }}</h1>
                <div class="mt-3">
                    <p class="text-lg text-gray-900">{{ $product['brand'] }}</p>
                </div>
                <div class="mt-6">
                    <div class="text-base text-gray-700 space-y-6">
                        <p>{{ $product['description'] }}</p>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-gray-900">${{ number_format($product['price'], 2) }}</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>
                            {{ $product['stock'] > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">{{ $product['stock'] }} units available</p>
                </div>
                <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="object-cover object-center"/>
                <!-- Quantity Form Using Pure PHP -->
                <form method="POST" action="{{ route('product.update', ['id' => $product['id']]) }}" class="mt-8">
                    @csrf
                    <div class="space-y-6"> 
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <div class="mt-1 flex rounded-md">
                                <!-- Minus Button -->
                                <button type="submit" name="decrement" class="!rounded-button relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-l-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-custom focus:border-custom">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <!-- Quantity Input (read-only) -->
                                <input type="text" name="quantity" id="quantity" class="text-center block w-24 border-gray-300 focus:ring-custom focus:border-custom sm:text-sm" value="<?php echo $quantity; ?>" readonly/>
                                <!-- Plus Button -->
                                <button type="submit" name="increment" class="!rounded-button relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-custom focus:border-custom">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" id="addToCartButton" class="!rounded-button flex-1 bg-gray-800 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-bolt mr-2"></i>
                                Add to Cart
                            </button>
                            <button type="button" class="!rounded-button flex-1 bg-gray-800 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <i class="fas fa-bolt mr-2"></i>
                                Buy Now
                            </button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    </main>
    <footer class="bg-white mt-16">
        <div class="max-w-8xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="border-t border-gray-200 pt-8 flex items-center justify-between">
                <p class="text-base text-gray-400">© 2025 R&R Corp.</p>
                <div class="flex space-x-6">
                    <!-- Replace AI payment methods image with your local asset -->
                    <img src="<?php echo asset('storage/images/payment_methods.png'); ?>" alt="Payment methods" class="h-8"/>
                </div>
            </div>
        </div>
    </footer>
    <!-- Include Login Modal -->
    @include('auth.login')

    <script>
            // JavaScript to toggle the modal
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

            document.getElementById('addToCartButton').addEventListener('click', function (e) {
                e.preventDefault();

                // Create a bubble element
                const bubble = document.createElement('div');
                bubble.className = 'bubble-animation';
                document.body.appendChild(bubble);

                // Get the button and cart icon positions
                const buttonRect = e.target.getBoundingClientRect();
                const cartIcon = document.querySelector('.fa-shopping-cart');
                const cartRect = cartIcon.getBoundingClientRect();

                // Set the bubble's initial position
                bubble.style.left = `${buttonRect.left + buttonRect.width / 2}px`;
                bubble.style.top = `${buttonRect.top + buttonRect.height / 2}px`;

                // Trigger the animation
                setTimeout(() => {
                    bubble.style.transform = `translate(${cartRect.left - buttonRect.left}px, ${cartRect.top - buttonRect.top}px) scale(0.5)`;
                    bubble.style.opacity = '0';
                }, 50);

                // Remove the bubble after the animation ends
                bubble.addEventListener('transitionend', () => {
                    bubble.remove();
                });
            });
        </script>
        <style>
            .bubble-animation {
                position: absolute;
                width: 30px;
                height: 30px;
                background-color: #4f46e5;
                border-radius: 50%;
                z-index: 1000;
                transition: transform 1s cubic-bezier(0.68, -0.55, 0.27, 1.55), opacity 1s;
                opacity: 1;
                pointer-events: none;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
        </style>
</body>
</html>

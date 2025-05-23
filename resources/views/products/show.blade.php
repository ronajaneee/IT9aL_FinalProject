<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#800080", secondary: "#4B0082" },
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

  <main class="container mx-auto px-4 py-24">
      <!-- Add back button -->
      <div class="mb-6">
          <a href="{{ route('welcome') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
              <i class="fas fa-arrow-left mr-2"></i>
              Back to Home
          </a>
      </div>
      
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Product Images -->
        <div class="lg:w-1/2">
          <div class="bg-white rounded shadow-sm p-4 mb-4">
            <img
             src="{{ asset('storage/' . $product->image) }}"
              alt="Product Image"
              class="w-full h-auto object-cover object-top"/>
          </div>
          <div class="grid grid-cols-4 gap-4">
            <div
              class="bg-white rounded shadow-sm p-2 cursor-pointer hover:border hover:border-primary">
              <img
               src="{{ asset('storage/' . $product->image) }}"
                alt="Thumbnail 1"
                class="w-full h-auto object-cover object-top"/>
            </div>
            <div
              class="bg-white rounded shadow-sm p-2 cursor-pointer hover:border hover:border-primary">
              <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="Thumbnail 2"
                class="w-full h-auto object-cover object-top"/>
            </div>
            <div
              class="bg-white rounded shadow-sm p-2 cursor-pointer hover:border hover:border-primary">
              <img 
              src="{{ asset('storage/' . $product->image) }}"
                alt="Thumbnail 3"
                class="w-full h-auto object-cover object-top"/>
            </div>
            <div
              class="bg-white rounded shadow-sm p-2 cursor-pointer hover:border hover:border-primary">
              <img 
              src="{{ asset('storage/' . $product->image) }}"
                alt="Thumbnail 4"
                class="w-full h-auto object-cover object-top"/>
            </div>
          </div>
        </div>

          <!-- Product Details -->
        <div class="lg:w/12">
          <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->ProductName ?? 'Product Name Not Available' }}</h1>
          <p class="text-gray-600 mb-6">
            {{ $product->Description ?? 'Description Not Available' }}
          </p>

          <div class="flex items-center mb-4">
            <div class="flex items-center mr-4">
              <i class="ri-star-fill text-yellow-400"></i>
              <i class="ri-star-fill text-yellow-400"></i>
              <i class="ri-star-fill text-yellow-400"></i>
              <i class="ri-star-fill text-yellow-400"></i>
              <i class="ri-star-half-fill text-yellow-400"></i>
            </div>
            <span class="text-gray-600">(128 reviews)</span>
          </div>

          <div class="flex items-center justify-between mb-6">
            <div>
              <span class="text-3xl font-bold text-gray-900">${{ $product->Price ?? '0.00' }}</span>
            </div>
            <div class="flex items-center text-green-600">
              <div class="w-4 h-4 bg-green-600 rounded-full mr-2"></div>
              <span>{{ $product->availability > 0 ? 'In Stock' : 'Out of Stock' }}</span>
              <span class="text-gray-600 ml-2">({{ $product->availability }} units available)</span>
            </div>
          </div>

          <div class="bg-white p-6 rounded shadow-sm mb-6">
            <h2 class="text-xl font-semibold mb-4">Product Description</h2>
            <p class="text-gray-700 mb-4">
              The product represents the perfect blend of performance and
              style. Featuring a sophisticated design with
              machine-finished faces and dark gunmetal accents. Each product is
              engineered using advanced technology ensuring optimal strength-to-weight ratio.
            </p>
            <p class="text-gray-700 mb-4">
              Designed for enthusiasts who demand both performance and
              aesthetics, these products offer exceptional durability while
              maintaining a lightweight profile that enhances vehicle handling
              and acceleration. The precision engineering reduces unsprung
              weight, improving overall driving dynamics.
            </p>
          </div>

          <div class="bg-white p-6 rounded shadow-sm mb-6">
            <h2 class="text-xl font-semibold mb-4">Technical Specifications</h2>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <p class="text-gray-600">Size</p>
                <p class="font-medium">18" x 8.5"</p>
              </div>
              <div>
                <p class="text-gray-600">Bolt Pattern</p>
                <p class="font-medium">5x114.3</p>
              </div>
              <div>
                <p class="text-gray-600">Offset</p>
                <p class="font-medium">+45mm</p>
              </div>
              <div>
                <p class="text-gray-600">Weight</p>
                <p class="font-medium">19.8 lbs</p>
              </div>
              <div>
                <p class="text-gray-600">Finish</p>
                <p class="font-medium">Machine Face with Gunmetal</p>
              </div>
              <div>
                <p class="text-gray-600">Construction</p>
                <p class="font-medium">One-piece cast aluminum</p>
              </div>
              <div>
                <p class="text-gray-600">Load Rating</p>
                <p class="font-medium">1650 lbs per product</p>
              </div>
              <div>
                <p class="text-gray-600">Warranty</p>
                <p class="font-medium">Limited Lifetime</p>
              </div>
            </div>
          </div>

            <div class="mb-6">
            <h3 class="text-lg font-medium mb-2">Quantity</h3>
            <div class="quantity-wrapper flex items-center">
              <button class="decrease w-10 h-10 flex items-center justify-center border border-gray-300 rounded-l-button bg-white hover:bg-gray-100">
                <i class="ri-subtract-line text-gray-700"></i>
              </button>
              <input
                type="number"
                class="quantity w-16 h-10 border-y border-gray-300 text-center text-gray-700 focus:outline-none"
                value="1"
                min="1"
                max="15"
                readonly/>
              <button
                class="increase w-10 h-10 flex items-center justify-center border border-gray-300 rounded-r-button bg-white hover:bg-gray-100">
                <i class="ri-add-line text-gray-700"></i>
              </button>
            </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', () => {
              // Find all quantity wrappers on the page
              document.querySelectorAll('.quantity-wrapper').forEach(wrapper => {
                const quantity = wrapper.querySelector('.quantity');
                const decrease = wrapper.querySelector('.decrease');
                const increase = wrapper.querySelector('.increase');

                const updateQuantity = (newValue) => {
                  const min = parseInt(quantity.min);
                  const max = parseInt(quantity.max);
                  newValue = Math.min(Math.max(newValue, min), max);
                  quantity.value = newValue;
                  
                  // Update the hidden input for the cart form
                  const cartQuantity = document.getElementById('cart-quantity');
                  if (cartQuantity) {
                    cartQuantity.value = newValue;
                  }
                };

                decrease.addEventListener('click', () => {
                  updateQuantity(parseInt(quantity.value) - 1);
                });

                increase.addEventListener('click', () => {
                  updateQuantity(parseInt(quantity.value) + 1);
                });
              });
            });
            </script>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->ProductID }}">
                <input type="hidden" name="quantity" id="cart-quantity" value="1">
                <button type="submit"
                        class="text-white py-3 px-6 rounded-lg flex items-center justify-center whitespace-nowrap transition-colors w-full hover:opacity-90"
                        style="background-color: #4F46E5;"
                        onclick="event.preventDefault(); 
                                document.getElementById('cart-quantity').value = document.getElementById('quantity').value;
                                this.closest('form').submit();
                                document.querySelector('[x-data]').__x.$data.cartOpen = true;">
                    <i class="ri-shopping-cart-line mr-2"></i>
                    Add to Cart
                </button>
              </form>
              <button
                onclick="window.location.href='{{ route('checkout.view') }}'"
                class="text-white py-3 px-6 rounded-lg flex items-center justify-center whitespace-nowrap transition-colors w-full hover:opacity-90"
                style="background-color: #4F46E5;">
                <i class="ri-flash-line mr-2"></i>
                Buy Now
              </button>
            </div>
             <div class="mt-6 flex items-center space-x-4">
          </div>
        </div>
      </div>
    </main>
    <!-- Include Login Modal -->
    @include('auth.login')

    <script>
document.addEventListener('DOMContentLoaded', () => {
    // Modal toggle for login
    const openLoginModal = document.getElementById('openLoginModal');
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLoginModal');

    if (openLoginModal && loginModal && closeLoginModal) {
        openLoginModal.addEventListener('click', () => {
            loginModal.classList.remove('hidden');
        });

        closeLoginModal.addEventListener('click', () => {
            loginModal.classList.add('hidden');
        });

        document.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    }

    // Toggle Cart Modal
    window.toggleCartModal = function () {
        const cartModal = document.getElementById('cartModal');
        const cartContent = document.getElementById('cartContent');

        if (cartModal && cartContent) {
            if (cartModal.classList.contains('hidden')) {
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
    };

    // Quantity Counter
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const quantityInput = document.getElementById('quantity');

    if (decreaseButton && increaseButton && quantityInput) {
        decreaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > parseInt(quantityInput.min)) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < parseInt(quantityInput.max)) {
                quantityInput.value = currentValue + 1;
            }
        });

        quantityInput.addEventListener('input', () => {
            let currentValue = parseInt(quantityInput.value);
            const minValue = parseInt(quantityInput.min);
            const maxValue = parseInt(quantityInput.max);

            if (isNaN(currentValue) || currentValue < minValue) {
                quantityInput.value = minValue;
            } else if (currentValue > maxValue) {
                quantityInput.value = maxValue;
            }
        });
    }
});
</script>

<!-- Add this near the end of the body tag, before other scripts -->
<script>
function openCartModal() {
    // Create a div for the backdrop
    const backdrop = document.createElement('div');
    backdrop.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'z-50');
    document.body.appendChild(backdrop);

    // Load and show cart.blade.php content
    fetch('<?php echo e(route("cart.view")); ?>')
        .then(response => response.text())
        .then(html => {
            document.body.insertAdjacentHTML('beforeend', html);
        });

    // Close when clicking backdrop
    backdrop.addEventListener('click', () => {
        backdrop.remove();
        const cartModal = document.querySelector('#cartModal');
        if (cartModal) cartModal.remove();
    });
}
</script>

</body>
</html>

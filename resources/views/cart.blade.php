<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <!-- Local Tailwind Custom CSS -->
    <link href="<?php echo 'css/tailwind-custom.css'; ?>" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <!-- Local Tailwind Config -->
    <script src="<?php echo 'js/tailwind-config.min.js'; ?>" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50">
    <div id="cartModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-xl rounded-lg shadow-xl">
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-lg font-semibold">Your Cart</h2>
                <div class="flex items-center gap-4">
                    <button class="text-blue-500 font-semibold hover:underline" onclick="window.location.href='{{ route('cart.view') }}'">
                        View Cart
                    </button>
                    <button onclick="toggleCartModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
            <div id="cartContent" class="p-4" style="min-height: 300px; overflow-y: auto;">
                <!-- Cart content will be dynamically loaded here -->
                @if(count($cartItems) > 0)
                    @foreach($cartItems as $cartItem)
                        <div class="flex gap-6 pb-6 border-b mb-6">
                            <!-- Example product -->
                            <img src="" alt="Product Image" class="w-32 h-32 object-cover rounded"/>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">{{ $cartItem->product->name }}</h3>
                                <p class="text-gray-500">{{ $cartItem->product->price }}</p>
                                <div class="flex items-center gap-4">
                                    <form method="POST" action="{{ route('cart.update', $cartItem->id) }}" class="flex items-center border rounded">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="decrement">
                                        <button type="submit" class="px-3 py-1 hover:bg-gray-100 rounded-l">-</button>
                                        <input type="text" name="quantity" value="{{ $cartItem->quantity }}" class="w-12 text-center border-x" readonly>
                                        <input type="hidden" name="action" value="increment">
                                        <button type="submit" class="px-3 py-1 hover:bg-gray-100 rounded-r">+</button>
                                    </form>
                                    <form method="POST" action="{{ route('cart.remove', $cartItem->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            <div class="p-4 border-t bg-gray-50">
                <p class="text-sm text-gray-500 mb-4">Taxes and shipping calculated at checkout.</p>
                <button
                    onclick="window.location.href='{{ route('checkout.view') }}'"
                    class="text-white py-3 px-6 rounded-lg flex items-center justify-center whitespace-nowrap transition-colors w-full hover:opacity-90"
                    style="background-color: #4F46E5;">
                    <i class="ri-flash-line mr-2"></i>
                    Checkout
                </button>
            </div>
        </div>
    </div>
</body>
<script>
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
</script>
</html>

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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-lg font-semibold">Your Cart</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('cart.view') }}" 
                       class="text-blue-600 hover:text-blue-700 font-medium transition-colors">
                        View Cart
                    </a>
                </div>
            </div>
            <div id="cartContent" class="p-4" style="min-height: 300px; overflow-y: auto;">
                @if(isset($cartItems) && count($cartItems) > 0)
                    @foreach($cartItems as $cartItem)
                        <div class="flex gap-6 pb-6 border-b mb-6">
                            <img src="{{ $cartItem->product->getImageUrl() }}" 
                                 alt="{{ $cartItem->product->ProductName }}" 
                                 class="w-32 h-32 object-cover rounded"/>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">{{ $cartItem->product->ProductName }}</h3>
                                <p class="text-gray-500">{{ $cartItem->product->getFormattedPrice() }}</p>
                                <div class="flex items-center gap-4">
                                    <form method="POST" action="{{ route('cart.update', $cartItem->CartitemID) }}" class="flex items-center border rounded">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="decrement">
                                        <button type="submit" class="px-3 py-1 hover:bg-gray-100 rounded-l">-</button>
                                        <input type="text" name="quantity" value="{{ $cartItem->quantity }}" class="w-12 text-center border-x" readonly>
                                        <button type="submit" name="action" value="increment" class="px-3 py-1 hover:bg-gray-100 rounded-r">+</button>
                                    </form>
                                    <form method="POST" action="{{ route('cart.remove', $cartItem->CartitemID) }}">
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
                    <div class="mt-4 text-right">
                        <p class="text-lg font-semibold">Total: ₱{{ number_format($total ?? 0, 2) }}</p>
                    </div>
                @else
                    <p class="text-center py-8 text-gray-500">Your cart is empty</p>
                @endif
            </div>
            <div class="p-4 border-t bg-gray-50">
                <p class="text-sm text-gray-500 mb-4">Taxes and shipping calculated at checkout.</p>
                <button
                    onclick="window.location.href='{{ route('checkout.view') }}'"
                    class="inline-flex items-center gap-2 text-white py-3 px-6 rounded-lg flex items-center justify-center whitespace-nowrap transition-colors w-full hover:opacity-90"
                    style="background-color: #4F46E5;">
                    <i class="ri-flash-line mr-2"></i>
                    Checkout
                </button>
            </div>
        </div>
    </div>
</body>
</html>

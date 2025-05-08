<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cart Details - UnderTheHood</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
</head>
<body class="bg-gray-100">
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
                                        <form method="POST" action="{{ route('cart.update', $item->rowId) }}" 
                                              class="flex items-center border rounded">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="action" value="decrement" 
                                                    class="px-4 py-2 hover:bg-gray-100">-</button>
                                            <span class="px-4 py-2 border-x">{{ $item->qty }}</span>
                                            <button type="submit" name="action" value="increment" 
                                                    class="px-4 py-2 hover:bg-gray-100">+</button>
                                        </form>
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
                        <a href="{{ route('products.index') }}" 
                           class="mt-6 inline-block text-blue-600 hover:text-blue-700 font-medium">
                            Continue Shopping
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

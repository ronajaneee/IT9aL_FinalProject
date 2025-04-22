<div class="p-4" style="min-height: 300px; overflow-y: auto;">
    @if(count($cartItems) > 0)
        @foreach($cartItems as $cartItem)
            <div class="flex gap-6 pb-6 border-b mb-6">
                <!-- Product Image -->
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

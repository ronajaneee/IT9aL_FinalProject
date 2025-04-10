<div class="p-4" style="min-height: 300px; overflow-y: auto;">
    <div class="flex gap-4 pb-4 border-b mb-4">
        <img src="{{ asset('storage/images/motorcycle-jacket.jpg') }}" alt="Motorcycle Jacket" class="w-20 h-20 object-cover rounded">
        <div class="flex-1">
            <h3 class="font-semibold mb-1">MAGNA NOVIC MOTORCYCLE TEXTILE JACKET</h3>
            <span class="text-lg font-semibold">₱9,780.00</span>
            <div class="flex items-center gap-4 mt-2">
                <button onclick="decrementQuantity()" class="px-2 py-1 border bg-gray-200 hover:bg-gray-300 rounded-l">-</button>
                <input id="quantityInput" type="text" value="1" class="w-12 text-center border-x" readonly>
                <button onclick="incrementQuantity()" class="px-2 py-1 border bg-gray-200 hover:bg-gray-300 rounded-r">+</button>
                <button onclick="deleteItem()" class="text-gray-400 hover:text-gray-600"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="p-4 border-t bg-gray-50">
        <p class="text-sm text-gray-500 mb-4">Taxes and shipping calculated at checkout.</p>
        <button class="w-full bg-blue-500 text-white py-2 font-semibold rounded hover:bg-blue-600">Checkout ₱9,780.00</button>
    </div>
</div>

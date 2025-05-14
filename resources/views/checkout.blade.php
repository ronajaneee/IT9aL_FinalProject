<!DOCTYPE html>
@php
    if (!Auth::check()) {
        return redirect()->route('welcome')
            ->with('openLoginModal', true)
            ->with('intended', url()->current());
    }
@endphp
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script>tailwind.config={theme:{extend:{colors:{primary:'#8B5CF6',secondary:'#6D28D9'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
<style>
    :where([class^="ri-"])::before { content: "\f3c2"; }
    input:focus, select:focus {
        outline: none;
        border-color: #8B5CF6;
        box-shadow: 0 0 0 1px #8B5CF6;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Left Column - Checkout Form -->
            <div class="flex-1 space-y-8">
                <!-- Account Section -->
                <div class="bg-white rounded p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Account</h2>
                        <button class="text-primary flex items-center">
                            <i class="ri-arrow-down-s-line ri-lg"></i>
                        </button>
                    </div>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>

                <!-- Delivery Section -->
                <div class="bg-white rounded p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-6">Delivery</h2>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <!-- Delivery Options -->
                            <div class="flex flex-col space-y-3">
                                <label class="flex items-center p-4 border rounded cursor-pointer">
                                    <input type="radio" name="delivery_method" value="ship" class="hidden" checked>
                                    <div class="w-5 h-5 flex items-center justify-center border rounded-full mr-3 relative">
                                        <div class="w-3 h-3 bg-primary rounded-full"></div>
                                    </div>
                                    <span>Ship</span>
                                    <div class="ml-auto w-6 h-6 flex items-center justify-center text-gray-500">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                </label>
                                <label class="flex items-center p-4 border rounded cursor-pointer">
                                    <input type="radio" name="delivery_method" value="pickup" class="hidden">
                                    <div class="w-5 h-5 flex items-center justify-center border rounded-full mr-3">
                                        <div class="w-3 h-3 bg-white rounded-full"></div>
                                    </div>
                                    <span>Pickup in store</span>
                                    <div class="ml-auto w-6 h-6 flex items-center justify-center text-gray-500">
                                        <i class="ri-store-line"></i>
                                    </div>
                                </label>
                            </div>

                            <!-- Address Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                                    <input type="text" name="first_name" class="w-full p-3 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                                    <input type="text" name="last_name" class="w-full p-3 border rounded" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <input type="text" name="address" class="w-full p-3 border rounded" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <div class="relative">
                                    <input type="tel" name="phone" class="w-full p-3 border rounded pr-10" required>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <i class="ri-information-line text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Section -->
                            <div class="bg-white rounded p-6 shadow-sm">
                                <h2 class="text-xl font-semibold mb-4">Payment</h2>
                                <p class="text-gray-600 mb-6">All transactions are secure and encrypted.</p>
                                <div class="flex space-x-2 mb-6">
                                    <div class="w-8 h-6 flex items-center justify-center bg-violet-600 rounded">
                                        <i class="ri-visa-fill text-white"></i>
                                    </div>
                                    <div class="w-8 h-6 flex items-center justify-center bg-red-500 rounded">
                                        <i class="ri-mastercard-fill text-white"></i>
                                    </div>
                                    <div class="w-8 h-6 flex items-center justify-center bg-blue-400 rounded">
                                        <i class="ri-paypal-fill text-white"></i>
                                    </div>
                                    <div class="w-8 h-6 flex items-center justify-center bg-green-500 rounded">
                                        <span class="text-white text-xs font-bold">GCash</span>
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-primary text-white py-4 px-6 rounded-button font-medium hover:bg-violet-700 transition duration-200">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="w-full md:w-96 bg-white rounded shadow-sm p-6 h-fit">
                <div class="space-y-6">
                    @foreach($cartItems as $item)
                    <div class="flex items-start">
                        <div class="w-16 h-16 flex-shrink-0 bg-gray-100 rounded overflow-hidden mr-4">
                            <img src="{{ asset('storage/images/' . ($item->options['image'] ?? 'default.jpg')) }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-medium">{{ $item->name }}</h3>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->qty }}</p>
                                </div>
                                <span class="ml-4">{{ $item->qty }}</span>
                            </div>
                            <p class="font-medium mt-1">₱{{ number_format($item->qty * $item->price, 2) }}</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-t pt-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Subtotal · {{ count($cartItems) }} items</span>
                            <span class="font-medium">₱{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">₱{{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-medium">
                            <span>Total</span>
                            <div class="text-right">
                                <span class="text-sm text-gray-500 block">PHP</span>
                                <span>₱{{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="orderModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div id="orderModalContent" class="mt-3 text-center">
            <!-- Content will be inserted here -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Radio button functionality
        const radioLabels = document.querySelectorAll('label:has(input[type="radio"])');
        radioLabels.forEach(label => {
            label.addEventListener('click', function() {
                // Reset all radio indicators
                document.querySelectorAll('label:has(input[type="radio"]) div > div').forEach(indicator => {
                    indicator.classList.remove('bg-primary');
                    indicator.classList.add('bg-white');
                });
                // Set the clicked radio indicator
                const indicator = this.querySelector('div > div');
                indicator.classList.remove('bg-white');
                indicator.classList.add('bg-primary');
            });
        });

        const form = document.querySelector('form[action="{{ route("checkout.process") }}"]');
        const modal = document.getElementById('orderModal');
        const modalContent = document.getElementById('orderModalContent');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            fetch('{{ route("checkout.process") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    modalContent.innerHTML = `
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Order Placed Successfully!</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">Your order has been processed successfully.</p>
                        </div>
                        <div class="mt-4">
                            <button onclick="window.location.href='${data.redirect}'" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                View Order
                            </button>
                        </div>`;
                } else {
                    modalContent.innerHTML = `
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Error</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">${data.message}</p>
                        </div>`;
                }
                modal.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                modalContent.innerHTML = `
                    <div class="text-red-500">
                        <h3 class="text-lg font-medium">Error</h3>
                        <p>An unexpected error occurred. Please try again.</p>
                    </div>`;
                modal.classList.remove('hidden');
            });
        });

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
</body>
</html>
<div id="orderConfirmationModal" 
     class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full"
     x-show="showConfirmation"
     x-cloak>
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <i class="fas fa-check text-green-600 text-xl"></i>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Order Placed Successfully!</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Thank you for your purchase! You can view your order details in your account settings.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeConfirmationModal"
                        class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
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
                <p class="text-gray-600">user@example.com</p>
             </div>
                    <!-- Delivery Section -->
                <div class="bg-white rounded p-6 shadow-sm">
                   <h2 class="text-xl font-semibold mb-6">Delivery</h2>
                  <div class="space-y-4">
                    <!-- Delivery Options -->
          <div class="flex flex-col space-y-3">
                <label class="flex items-center p-4 border rounded cursor-pointer">
                 <input type="radio" name="delivery" class="hidden" checked>
                   <div class="w-5 h-5 flex items-center justify-center border rounded-full mr-3 relative">
                    <div class="w-3 h-3 bg-primary rounded-full"></div>
                  </div>
                        <span>Ship</span>
              <div class="ml-auto w-6 h-6 flex items-center justify-center text-gray-500">
                      <i class="ri-truck-line"></i>
                    </div>
              </label>
                    <label class="flex items-center p-4 border rounded cursor-pointer">
                          <input type="radio" name="delivery" class="hidden">
                              <div class="w-5 h-5 flex items-center justify-center border rounded-full mr-3">
                          <div class="w-3 h-3 bg-white rounded-full"></div>
                              </div>
                                <span>Pickup in store</span>
                  <div class="ml-auto w-6 h-6 flex items-center justify-center text-gray-500">
                              <i class="ri-store-line"></i>
                          </div>
                                </label>
                          </div>
                  <!-- Country/Region Selector -->
                        <div class="mt-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Country/Region</label>
                                     <div class="relative">
                                        <select class="w-full p-3 border rounded appearance-none text-gray-700">
                                              <option>Philippines</option>
                                                  <option>United States</option>
                                                    <option>Canada</option>
                                                      <option>Australia</option>
                                                        <option>United Kingdom</option>
                                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="ri-arrow-down-s-line text-gray-400"></i>
                        </div>
                  </div>
          </div>
              <!-- Name Fields -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                              <label class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                                  <input type="text" class="w-full p-3 border rounded">
                              </div>
                            <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                                  <input type="text" class="w-full p-3 border rounded">
                            </div>
                           </div>
            <!-- Company Field -->
                          <div>
                              <label class="block text-sm font-medium text-gray-700 mb-1">Company (optional)</label>
                                <input type="text" class="w-full p-3 border rounded">
                                  </div>
              <!-- Address Fields -->
                        <div>
                              <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                      <input type="text" class="w-full p-3 border rounded">
                          </div>
                      <div>
                          <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
                      <input type="text" class="w-full p-3 border rounded">
                  </div>
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">Postal code</label>
                               <input type="text" class="w-full p-3 border rounded">
                      </div>
                <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                               <input type="text" class="w-full p-3 border rounded">
                      </div>
                </div>
            <!-- Region Field -->
                <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                              <div class="relative">
                <select class="w-full p-3 border rounded appearance-none text-gray-500">
                        <option>Select region</option>
                          <option>Metro Manila</option>
                            <option>Cebu</option>
                              <option>Davao</option>
                                <option>Iloilo</option>
                                  </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <i class="ri-arrow-down-s-line text-gray-400"></i>
                </div>
            </div>
        </div>
              <!-- Phone Field -->
                <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <div class="relative">
                <input type="tel" class="w-full p-3 border rounded pr-10">
                          <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                <i class="ri-information-line text-gray-400"></i>
                  </div>
             </div>
         </div>
    </div>
</div>
          <!-- Payment Section -->
                    <div class="bg-white rounded p-6 shadow-sm">
                              <h2 class="text-xl font-semibold mb-4">Payment</h2>
                <p class="text-gray-600 mb-6">All transactions are secure and encrypted.</p>
                            <div class="border rounded p-4 mb-6">
                    <div class="flex justify-between items-center">
                          <div>
            <h3 class="font-medium">Pay via Secure Payment Gateway</h3>
                            <p class="text-sm text-gray-500 mt-1">After clicking "Pay now", you will be redirected to a secure payment gateway to complete your purchase.</p>
             </div>
                        <div class="flex space-x-2">
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
              </div>
         </div>
              <button class="w-full bg-primary text-white py-4 px-6 rounded-button font-medium hover:bg-violet-700 transition duration-200 whitespace-nowrap !rounded-button">Pay now</button>
                          <div class="text-center mt-6 text-sm text-gray-500">
              <a href="#" class="text-primary hover:underline">Refund policy</a>
                      <span class="mx-2">•</span>
              <a href="#" class="text-primary hover:underline">Terms of service</a>
        </div>
    </div>
</div>
          <!-- Right Column - Order Summary -->
                    <div class="w-full md:w-96 bg-white rounded shadow-sm p-6 h-fit">
            <div class="space-y-6">
            <!-- Product 1 -->
                      <div class="flex items-start">
                                  <div class="w-16 h-16 flex-shrink-0 bg-gray-100 rounded overflow-hidden mr-4">
                                            <img src="placeholder-image.jpg" alt="Tire" class="w-full h-full object-cover">
                                      </div>
                      <div class="flex-1">
                                <div class="flex justify-between">
                            <div>
                      <h3 class="font-medium">METZELER ROADTEC SCOOTER TIRE</h3>
                      <p class="text-sm text-gray-500">110/70 - 12 (F/RR)</p>
                  </div>
                      <span class="ml-4">1</span>
                </div>
                      <p class="font-medium mt-1">₱2,080.00</p>
            </div>
        </div>
        <!-- Product 2 -->
              <div class="flex items-start">
                            <div class="w-16 h-16 flex-shrink-0 bg-gray-100 rounded overflow-hidden mr-4">
                                      <img src="placeholder-image.jpg" alt="Jacket" class="w-full h-full object-cover">
                            </div>
              <div class="flex-1">
                            <div class="flex justify-between">
              <div>
                          <h3 class="font-medium">MACNA NOVIC MOTORCYCLE TEXTILE JACKET</h3>
                                  <p class="text-sm text-gray-500">BLACK / L</p>
              </div>
                      <span class="ml-4">1</span>
              </div>
                        <p class="font-medium mt-1">₱9,780.00</p>
              </div>
          </div>
                        <div class="border-t pt-4">
                      <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Subtotal · 2 items</span>
                  <span class="font-medium">₱11,860.00</span>
            </div>
                    <div class="flex justify-between mb-4">
                  <span class="text-gray-600">Shipping</span>
              <span class="text-violet-600">Enter shipping address</span>
                  </div>
                    <div class="flex justify-between text-lg font-medium">
                      <span>Total</span>
                        <div class="text-right">
                          <span class="text-sm text-gray-500 block">PHP</span>
                            <span>₱11,860.00</span>
                          </div>
                        </div>
                     </div>
                  </div>
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
        // Set the radio input as checked
      this.querySelector('input[type="radio"]').checked = true;
});
});
});
</script>
</body>
</html>
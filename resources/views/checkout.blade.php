<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout - Motoworld Forged</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <!-- Local Tailwind Custom CSS -->
  <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
  <!-- Local Tailwind Config -->
  <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50">
  <header class="bg-white border-b">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center">
      <!-- Replace the AI logo with your local logo -->
      <img src="{{ asset('storage/images/logo.png') }}" alt="Motoworld Forged" class="h-8 mr-auto"/>
    </div>
  </header>
  <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Left Column: Checkout Form -->
      <div class="lg:col-span-2">
        <div class="mb-8">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Account</h2>
            <button class="text-blue-500 hover:text-blue-600">
              <i class="fas fa-chevron-down ml-2"></i>
            </button>
          </div>
          <div class="text-gray-600">ronajanecondiman08@gmail.com</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 mb-8">
          <h2 class="text-lg font-semibold mb-6">Delivery</h2>
          <div class="space-y-4 mb-6">
            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500">
              <input type="radio" name="delivery" class="text-blue-500" checked=""/>
              <span class="ml-3">Ship</span>
              <i class="fas fa-truck ml-auto text-gray-400"></i>
            </label>
            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500">
              <input type="radio" name="delivery" class="text-blue-500"/>
              <span class="ml-3">Pickup in store</span>
              <i class="fas fa-store ml-auto text-gray-400"></i>
            </label>
          </div>
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Country/Region</label>
              <select class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option>Philippines</option>
              </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Company (optional)</label>
              <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
              <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
              <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Postal code</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Region</label>
              <select class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option>Select region</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
              <div class="relative">
                <input type="tel" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"/>
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                  <i class="fas fa-circle-info"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 mb-8">
          <h2 class="text-lg font-semibold mb-6">Payment</h2>
          <p class="text-sm text-gray-600 mb-4">All transactions are secure and encrypted.</p>
          <div class="border rounded-lg p-4 mb-4">
            <div class="flex items-center justify-between mb-4">
              <span class="font-medium">Pay via Paynamics v2</span>
              <div class="flex space-x-2">
                <i class="fab fa-cc-visa text-blue-600"></i>
                <i class="fab fa-cc-mastercard text-red-500"></i>
                <i class="fab fa-cc-amex text-blue-500"></i>
                <i class="fab fa-cc-jcb text-green-600"></i>
              </div>
            </div>
            <p class="text-sm text-gray-600">
              After clicking "Pay now", you will be redirected to Paynamics to complete your purchase securely.
            </p>
          </div>
        </div>
        <button class="w-full bg-blue-500 text-white py-4 px-6 rounded-lg font-medium hover:bg-blue-600">
          Pay now
        </button>
        <div class="mt-6 text-center text-sm text-gray-600">
          <a href="#" class="text-blue-500 hover:text-blue-600">Refund policy</a>
          <span class="mx-2">•</span>
          <a href="#" class="text-blue-500 hover:text-blue-600">Terms of service</a>
        </div>
      </div>
      <!-- Right Column: Order Summary -->
      <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6">
          <div class="space-y-4 mb-6">
            <div class="flex items-center">
              <img src="{{ asset('storage/images/tire_small.jpg') }}" alt="Tire" class="w-20 h-20 object-cover rounded"/>
              <div class="ml-4 flex-1">
                <h3 class="font-medium">METZELER ROADTEC SCOOTER TIRE</h3>
                <p class="text-sm text-gray-600">110/70 - 12 (FR/RR)</p>
                <p class="text-sm font-medium mt-1">₱2,080.00</p>
              </div>
              <div class="bg-gray-100 rounded-full w-6 h-6 flex items-center justify-center">
                <span class="text-sm">1</span>
              </div>
            </div>
            <div class="flex items-center">
              <img src="{{ asset('storage/images/jacket_small.jpg') }}" alt="Jacket" class="w-20 h-20 object-cover rounded"/>
              <div class="ml-4 flex-1">
                <h3 class="font-medium">MACNA NOVIC MOTORCYCLE TEXTILE JACKET</h3>
                <p class="text-sm text-gray-600">BLACK / L</p>
                <p class="text-sm font-medium mt-1">₱9,780.00</p>
              </div>
              <div class="bg-gray-100 rounded-full w-6 h-6 flex items-center justify-center">
                <span class="text-sm">1</span>
              </div>
            </div>
          </div>
          <div class="border-t pt-4">
            <div class="space-y-2 text-sm">
              <div class="flex justify-between">
                <span class="text-gray-600">Subtotal · 2 items</span>
                <span class="font-medium">₱11,860.00</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Shipping</span>
                <span class="text-gray-600">Enter shipping address</span>
              </div>
            </div>
            <div class="border-t mt-4 pt-4 flex justify-between items-center">
              <span class="text-gray-600">Total</span>
              <div class="text-right">
                <span class="text-sm text-gray-600">PHP</span>
                <span class="text-xl font-medium ml-1">₱11,860.00</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

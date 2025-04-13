<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnderTheHood</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#3b82f6',secondary:'#f59e0b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <style>
        .bg-secondary { background-color:rgba(160, 5, 207, 0.9); }
        .hover\:bg-secondary\/90:hover { background-color: rgba(76, 3, 99, 0.9); }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
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
</head>
<body class="bg-gray-100">
      <!-- Header Section -->
  <header class="fixed w-full top-0 z-50 bg-white shadow-sm">
    <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Section: Logo & Navigation -->
        <div class="flex items-center">
          <a href="/" class="flex-shrink-0">
          <img class="h-12 md:h-16 lg:h-20 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Under The Hood Supply"/>
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
              <input id="search" name="search" type="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search parts by vehicle, brand, or part number...">
            </div>
          </div>
        </div>
        <!-- Right Section: Account & Cart Icons -->
        <div class="flex items-center space-x-6">
            <a id="openLoginModal" href="javascript:void(0);" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-user text-xl"></i>
            </a>
            <!-- Cart Button opens the cart modal -->
            <a href="{{ route('cart') }}" class="relative text-gray-600 hover:text-gray-900">
                <i class="fas fa-shopping-cart text-xl"></i>
                <span class="absolute -top-1 -right-1 h-4 w-4 text-xs bg-blue-500 text-white rounded-full flex items-center justify-center">2</span>
            </a>
        </div>
      </div>
    </nav>
  </header>
        </div>
      </div>
    </nav>
  </header>

        <main class="container mx-auto px-4 py-20">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="w-full md:w-64 shrink-0">
                <div class="bg-white p-6 rounded shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Filter</h2>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold mb-3">Categories</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Engine Parts</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Brake Systems</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Transmission</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Suspension</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Wheel Rim</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="engine-type" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Interior</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold mb-3">Displacement</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="displacement" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>100-250cc</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="displacement" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>251-500cc</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="displacement" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>501-750cc</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="radio" name="displacement" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded-full"></div>
                                    <div class="w-3 h-3 bg-primary rounded-full absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>751cc+</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold mb-3">Manufacturer</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Bilstein</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Brembo</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Enkie</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Mercedez</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>Toyota</span>
                            </label>
                            <label class="flex items-center">
                                <div class="w-5 h-5 flex items-center justify-center mr-3 relative">
                                    <input type="checkbox" class="opacity-0 absolute w-full h-full cursor-pointer z-10">
                                    <div class="w-5 h-5 border border-gray-300 rounded"></div>
                                    <div class="w-3 h-3 bg-primary rounded absolute opacity-0 transform scale-0 transition-all"></div>
                                </div>
                                <span>ZF</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="font-semibold mb-3">Price Range</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <input type="number" placeholder="Min" class="w-24 px-3 py-2 border border-gray-200 rounded text-sm">
                                <span class="text-gray-400">-</span>
                                <input type="number" placeholder="Max" class="w-24 px-3 py-2 border border-gray-200 rounded text-sm">
                            </div>
                            <button class="bg-primary text-white w-full py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Sorting and View Options -->
                <div class="bg-white p-4 rounded shadow-sm flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <button class="flex items-center space-x-2 px-4 py-2 border border-gray-200 rounded-button whitespace-nowrap">
                            <i class="ri-filter-3-line"></i>
                            <span>Filter</span>
                        </button>
                        
                        <div class="relative">
                            <button class="flex items-center space-x-2 px-4 py-2 border border-gray-200 rounded-button whitespace-nowrap">
                                <span>Sort by: Featured</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </button>
                            <div class="hidden absolute top-full left-0 mt-1 bg-white border border-gray-200 rounded shadow-lg w-48 z-10">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Featured</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Price: Low to High</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Price: High to Low</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Newest</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Best Selling</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">View as:</span>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-primary">
                            <i class="ri-list-check"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-primary bg-primary/10 text-primary">
                            <i class="ri-grid-line"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product 1 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                            <img src="storage/images/ProductTestImage.jpg" alt="Honda CB650R Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Honda CB650R Inline-Four Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">649cc DOHC 16-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-half-fill"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">4.5 (28 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$3,499.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                        <img src="storage/images/ProductTestImage.jpg" alt="Yamaha CP2 Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Yamaha CP2 Parallel-Twin Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">689cc DOHC 8-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">5.0 (42 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$2,899.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                        <img src="storage/images/ProductTestImage.jpg" alt="Kawasaki Ninja ZX-10R Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Kawasaki Ninja ZX-10R Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">998cc DOHC 16-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">4.0 (19 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$4,799.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                        <img src="storage/images/ProductTestImage.jpg" alt="BMW R1250 Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">BMW R1250 Boxer-Twin Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">1254cc DOHC 8-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-half-fill"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">4.7 (36 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$5,999.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                        <img src="storage/images/ProductTestImage.jpg" alt="KTM 390 Duke Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">KTM 390 Duke Single-Cylinder Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">373cc DOHC 4-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">4.2 (24 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$1,899.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-100 flex items-center justify-center h-64">
                        <img src="storage/images/ProductTestImage.jpg" alt="Suzuki GSX-R1000 Engine" class="object-contain h-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Suzuki GSX-R1000 Engine</h3>
                            <p class="text-gray-600 text-sm mb-2">999cc DOHC 16-Valve</p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <span class="text-sm text-gray-500 ml-2">4.1 (31 Reviews)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold">$4,299.00</span>
                                <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">Add to Cart</button>
                                <!-- Add cart icon button -->
                                <button class="ml-2 bg-secondary text-white p-2 rounded-full hover:bg-secondary/90 transition-colors">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                            <!-- View Button -->
                            <div class="mt-2">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-purple-600 font-medium hover:underline">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center space-x-1">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-primary bg-primary text-white">1</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50">2</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50">3</a>
                        <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50">8</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="bg-gray-900">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <!-- Image here -->
                    <img class="h-28 w-auto" src="storage/images/logo.png" alt="Under The Hood Supply"/>
                    <p class="mt-4 text-gray-400 text-sm">Premium automotive parts and accessories for enthusiasts and professionals.</p>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">FAQs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Customer Service</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Shipping Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Order Status</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Payment Methods</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Subscribe to receive updates, access to exclusive deals, and more.</p>
                    <form class="flex">
                        <input type="email" class="flex-1 bg-gray-800 text-white px-4 py-2 !rounded-button border-0 focus:ring-2 focus:ring-custom" placeholder="Enter your email"/>
                        <button type="submit" class="ml-2 bg-custom text-white px-4 py-2 !rounded-button hover:bg-custom/90">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex justify-between items-center">
                    <p class="text-gray-400 text-sm">© 2025 R&R Corp. All rights reserved.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    @include('auth.login')
    <script>
// JavaScript to toggle the modal
const openLoginModal = document.getElementById('openLoginModal');
            const loginModal = document.getElementById('loginModal');
            const closeLoginModal = document.getElementById('closeLoginModal');
    
            openLoginModal.addEventListener('click', () => {
                loginModal.classList.remove('hidden');
            });
    
            closeLoginModal.addEventListener('click', () => {
                loginModal.classList.add('hidden');
            });
    
            // Close modal when clicking outside the modal content
            document.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    loginModal.classList.add('hidden');
                }
            });
    
            // Function to toggle the cart modal
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

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Modal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <!-- Local Tailwind Custom CSS -->
  <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
  <!-- Local Tailwind Config -->
  <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-100 min-h-screen font-['Inter']">
  <div class="fixed top-4 right-4 w-[420px] bg-white rounded-lg shadow-xl p-8">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold text-gray-900">Create account</h2>
    </div>
    <form class="space-y-6" method="POST" action="{{ route('register') }}">
    @csrf
      <div>
        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
        <input type="text" id="firstName" name="firstName" class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>
      <div>
        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
        <input type="text" id="lastName" name="lastName" class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <div class="relative">
          <input type="password" id="password" name="password" class="w-full h-12 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
          <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <i class="far fa-eye"></i>
          </button>
        </div>
      </div>
      <button type="submit" class="w-full h-12 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">
        CONFIRM &amp; CREATE ACCOUNT
      </button>
      <p class="text-sm text-gray-600 text-center">
        By creating your account or signing-in, you agree to our
        <a href="#" class="text-blue-500 hover:text-blue-600">Terms &amp; Conditions</a> and
        <a href="#" class="text-blue-500 hover:text-blue-600">Privacy Policy</a>.
      </p>
      <p class="text-sm text-gray-600 text-center">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600 font-medium">Log in here</a>
      </p>
    </form>
  </div>
</body>
</html>

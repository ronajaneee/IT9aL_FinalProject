<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <!-- Local Tailwind Custom CSS -->
  <link href="{{ asset('css/tailwind-custom.css') }}" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
  <!-- Local Tailwind Config -->
  <script src="{{ asset('js/tailwind-config.min.js') }}" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-100">
  <!-- Login Modal -->
  <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center {{ $errors->has('keepModalOpen') ? '' : 'hidden' }}">
    <div class="w-[420px] bg-white rounded-lg shadow-xl p-8 relative">
      <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Login</h2>
      @error('loginError')
        <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded relative" role="alert">
            <p class="text-sm">{{ $message }}</p>
        </div>
      @enderror
      <form class="space-y-5" method="POST" action="{{ route('login') }}">
        @csrf
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-100 text-gray-900 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your email" required>
          </div>
          @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" class="w-full bg-gray-100 text-gray-900 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your password" required>
          </div>
          @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2.5 rounded-xl transition-all font-semibold shadow-lg hover:shadow-xl">
          Sign in
        </button>
      </form>

      <!-- Show Registration Modal Script -->
      @if($errors->has('show_register'))
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          if(document.getElementById('registerModal')) {
            loginModal.classList.add('hidden');
            registerModal.classList.remove('hidden');
          }
        });
      </script>
      @endif

      <div class="mt-6 text-center">
        <p class="text-gray-600">Don't have an account?
        <a href="javascript:void(0);" id="openRegisterModal" class="text-blue-500 hover:text-blue-600 font-semibold transition-colors">Create account</a>
        </p>
      </div>
      <!-- Close Button -->
      <button id="closeLoginModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <!-- Register Modal -->
  <div id="registerModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="w-[420px] bg-white rounded-lg shadow-xl p-8 relative">
      <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Create account</h2>
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
          <a href="javascript:void(0);" id="openLoginModal" class="text-blue-500 hover:text-blue-600 font-medium">Log in here</a>
        </p>
      </form>
      <!-- Close Button -->
      <button id="closeRegisterModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <!-- JavaScript for Modal Toggle -->
  <script>
    const openLoginModal = document.getElementById('openLoginModal');
    const loginModal = document.getElementById('loginModal');
    const closeLoginModal = document.getElementById('closeLoginModal');

    const openRegisterModal = document.getElementById('openRegisterModal');
    const registerModal = document.getElementById('registerModal');
    const closeRegisterModal = document.getElementById('closeRegisterModal');

    if (openLoginModal) {
      openLoginModal.addEventListener('click', () => {
        loginModal.classList.remove('hidden');
        registerModal.classList.add('hidden');
      });
    }

    if (openRegisterModal) {
      openRegisterModal.addEventListener('click', () => {
        registerModal.classList.remove('hidden');
        loginModal.classList.add('hidden');
      });
    }

    if (closeLoginModal) {
      closeLoginModal.addEventListener('click', () => {
        loginModal.classList.add('hidden');
      });
    }

    if (closeRegisterModal) {
      closeRegisterModal.addEventListener('click', () => {
        registerModal.classList.add('hidden');
      });
    }

    // Close modals when clicking outside the modal content
    document.addEventListener('click', (e) => {
      if (e.target === loginModal) {
        loginModal.classList.add('hidden');
      }
      if (e.target === registerModal) {
        registerModal.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
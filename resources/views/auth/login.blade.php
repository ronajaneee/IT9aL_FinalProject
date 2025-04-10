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
  <div id="loginModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="w-[420px] bg-white rounded-lg shadow-xl p-8 relative">
      <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Login</h2>
      <form class="space-y-5" method="POST" action="{{ route('login') }}">
        @csrf
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" name="email" class="w-full bg-gray-100 text-gray-900 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your email" required>
          </div>
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" class="w-full bg-gray-100 text-gray-900 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your password" required>
          </div>
        </div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2.5 rounded-xl transition-all font-semibold shadow-lg hover:shadow-xl">
          Sign in
        </button>
      </form>
      <div class="mt-6 text-center">
        <p class="text-gray-600">Don't have an account?
          <a href="{{ url('/register') }}" class="text-blue-500 hover:text-blue-600 font-semibold transition-colors">Create account</a>
        </p>
      </div>
      <!-- Close Button -->
      <button id="closeLoginModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <!-- JavaScript for Modal Toggle -->
  <script>
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
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center flex items-center justify-center"
      style="background-image: url('{{ asset('bg/bg0.jpg') }}');">

  <!-- Card Forgot Password -->
  <div class="bg-white/80 backdrop-blur-md shadow-xl rounded-2xl w-[400px] p-8">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="{{ asset('logo/intel amfibi.png') }}" alt="Logo"
           class="h-16 w-16 object-contain rounded-full shadow-md">
    </div>

    <!-- Judul -->
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Forgot Password?</h2>
    <p class="text-sm text-gray-600 text-center mb-6">
      No problem! Just enter your email and we'll send you a link to reset your password.
    </p>

    <!-- Session Status -->
    @if (session('status'))
      <div class="mb-4 text-green-600 text-sm text-center font-medium">
        {{ session('status') }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
      @csrf
      <!-- Email -->
      <div>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
          placeholder="Enter your email"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-400 focus:outline-none">
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition">
        Send Reset Link
      </button>
    </form>

    <!-- Divider -->
    <div class="flex items-center my-6">
      <div class="flex-grow h-px bg-gray-300"></div>
      <span class="px-3 text-sm text-gray-500">Back to</span>
      <div class="flex-grow h-px bg-gray-300"></div>
    </div>

    <!-- Link ke Login -->
    <div class="text-center">
      <a href="{{ route('login') }}" class="text-sm font-semibold text-sky-600 hover:underline">
        Login
      </a>
    </div>
  </div>

</body>
</html>

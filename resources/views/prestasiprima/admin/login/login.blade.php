<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - News Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-white">

  <div class="flex w-[800px] h-[450px] rounded-2xl overflow-hidden shadow-xl border border-orange-200">
    
    <!-- Left Panel -->
    <div class="flex flex-col justify-center w-1/2 bg-orange-500 text-white px-10">
      <h2 class="text-2xl font-semibold mb-2">Selamat Datang</h2>
      <h1 class="text-3xl font-bold">Di Prestasi Prima</h1>
    </div>

    <!-- Right Panel -->
    <div class="flex flex-col justify-center items-center w-1/2 bg-white p-10 relative">
      <div class="text-orange-500 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
        </svg>
      </div>

      <form method="POST" action="{{ route('authPP.login.post') }}" class="w-full">
        @csrf

        <!-- Email -->
        <div class="mb-4">
          <label class="block text-gray-600 text-sm mb-1">Email</label>
          <div class="relative">
            <input type="email" name="email" placeholder="your email" required
                   class="w-full border border-orange-300 rounded-lg py-2 pl-10 pr-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400" />
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-2.5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12H8m8 4H8m8-8H8m-2 8a9 9 0 1118 0A9 9 0 016 16z" />
            </svg>
          </div>
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block text-gray-600 text-sm mb-1">Password</label>
          <div class="relative">
            <input type="password" name="password" placeholder="your password" required
                   class="w-full border border-orange-300 rounded-lg py-2 pl-10 pr-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400" />
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-2.5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 0v10m0-10H9m3 0h3" />
            </svg>
          </div>
        </div>

        @if ($errors->any())
          <div class="text-red-500 text-sm mb-3">
            {{ $errors->first() }}
          </div>
        @endif

        <!-- Button -->
        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition">
          Login
        </button>
      </form>
    </div>
  </div>

</body>
</html>

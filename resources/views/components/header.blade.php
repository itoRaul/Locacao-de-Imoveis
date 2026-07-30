<header class="bg-white shadow mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">{{ $title ?? 'Sistema' }}</h1>
        <div>
            @auth
                <div class="flex items-center gap-4">
                    <span class="text-gray-600 font-medium">Olá, {{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition font-semibold">Sair</a>
                </div>
            @else
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-semibold">Login</a>
            @endauth
        </div>
    </div>
</header>

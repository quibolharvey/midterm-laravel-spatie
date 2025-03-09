<div class="flex flex-col h-full w-1/4 bg-indigo-600 justify-between items-start p-6 text-gray-100">
    <div class="flex flex-col gap-4 w-full">
        <!-- Brand Name -->
        <a href="{{ route('index') }}" class="text-3xl font-bold mb-3 text-white">BICEPCURL</a>

        <!-- Navigation Links -->
        <a href="{{ route('home') }}" class="text-lg hover:text-gray-300 transition">Home</a>

        @if (auth()->check())
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left text-lg hover:text-gray-300 transition focus:outline-none">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-lg hover:text-gray-300 transition">Login</a>
        @endif
    </div>

    <!-- User Display -->
    <div class="w-full flex justify-center border-t border-gray-300 pt-4">
        <p class="text-lg text-gray-200">{{ auth()->check() ? auth()->user()->name : 'Guest' }}</p>
    </div>
</div>

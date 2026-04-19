



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <!-- HEADER -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto bg-green-600 text-white rounded-full flex items-center justify-center text-2xl mb-3">
                🎓
            </div>

            <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
            <p class="text-sm text-gray-500">SMP Almarzukiyyah</p>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-8">

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="email@gmail.com"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- PASSWORD -->
                <div x-data="{ show: false }">
                    <label class="text-sm font-medium text-gray-700">Password</label>

                    <div class="relative mt-1">
                        <input
                            :type="show ? 'text' : 'password'"
                            name="password"
                            placeholder="••••••••"
                            class="w-full px-4 py-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            required
                        >

                        <!-- toggle -->
                        <!-- toggle -->
    <button
        type="button"
        @click="show = !show"
        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-800"
    >
        <!-- Eye Off -->
        <svg
            x-show="!show"
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"/>
            <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242"/>
            <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"/>
            <path d="m2 2 20 20"/>
        </svg>

        <!-- Eye -->
        <svg
            x-show="show"
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </button>
                    </div>
                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition"
                >
                    Masuk
                </button>

            </form>

            <!-- INFO -->
            <p class="text-xs text-gray-400 text-center mt-6">
                Demo: admin@smp.ac.id / admin123
            </p>

        </div>
    </div>
</div>

</body>
</html>
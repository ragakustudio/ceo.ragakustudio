<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — CEO Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-sm px-6">

        <!-- Logo / Brand -->
        <div class="mb-10 text-center">
            <p class="text-white/40 text-sm uppercase tracking-widest mb-2">CEO Dashboard</p>
            <h1 class="text-2xl font-bold">Radhitia Dwijaya</h1>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-white/50 mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-lime-400 transition"
                    placeholder="hello@ragakustudio.com"
                />
            </div>

            <div>
                <label class="block text-sm text-white/50 mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-lime-400 transition"
                    placeholder="••••••••"
                />
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" class="accent-lime-400">
                <label for="remember" class="text-sm text-white/40">Remember me</label>
            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-lime-400 text-black font-semibold hover:bg-lime-300 transition mt-2">
                Login
            </button>

        </form>

        <!-- Footer -->
        <p class="text-center text-white/20 text-xs mt-10">
            © {{ date('Y') }} Ragaku Studio
        </p>

    </div>

</body>
</html>
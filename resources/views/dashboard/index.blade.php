<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — CEO</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-10">

        <div>
            <p class="text-white/40 text-sm uppercase tracking-widest">Dashboard</p>
            <h1 class="text-2xl font-semibold">Radhitia Dwijaya 👋</h1>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 rounded-lg border border-white/[0.15] text-white/60 hover:border-white hover:text-white transition text-sm">
                Logout
            </button>
        </form>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-2 gap-6">

        <!-- TASKS -->
        <div class="bg-[#111111] border border-white/[0.06] p-5 rounded-2xl">

            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold">Tasks</h2>
                <a href="/tasks" class="text-xs text-white/40 hover:text-white">View all →</a>
            </div>

            @forelse($tasks as $task)
                <div class="mb-3">
                    <p class="text-sm text-white/90">
                        {{ $task->title }}
                    </p>

                    @if($task->due_date)
                        <p class="text-xs text-white/40">
                            {{ \Carbon\Carbon::parse($task->due_date)->format('d M') }}
                        </p>
                    @endif
                </div>
            @empty
                <p class="text-white/30 text-sm">No tasks yet</p>
            @endforelse

        </div>

        <!-- KNOWLEDGE -->
        <div class="bg-[#111111] border border-white/[0.06] p-5 rounded-2xl">

            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold">Knowledge</h2>
                <a href="/knowledge" class="text-xs text-white/40 hover:text-white">View all →</a>
            </div>

            @forelse($knowledges as $item)
                <div class="mb-3">

                    <p class="text-xs text-white/40 uppercase">
                        {{ $item->type }}
                    </p>

                    <p class="text-sm text-white/90">
                        {{ $item->title }}
                    </p>

                </div>
            @empty
                <p class="text-white/30 text-sm">No knowledge yet</p>
            @endforelse

        </div>

    </div>

    <!-- QUICK ACTION -->
    <div class="mt-10">

        <p class="text-white/40 text-sm mb-3">Quick Actions</p>

        <div class="flex gap-3">
            <a href="/tasks" class="px-4 py-2 bg-white/[0.05] border border-white/[0.08] rounded-lg text-sm hover:bg-white/[0.1] transition">
                + Task
            </a>

            <a href="/knowledge" class="px-4 py-2 bg-white/[0.05] border border-white/[0.08] rounded-lg text-sm hover:bg-white/[0.1] transition">
                + Insight
            </a>
        </div>

    </div>

</body>
</html>
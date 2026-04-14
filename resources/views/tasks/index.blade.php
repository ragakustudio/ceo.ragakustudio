<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weekly Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen p-8">

    <!-- NAV -->
    <div class="flex items-center justify-between mb-8">
        <a href="/tasks?week={{ \Carbon\Carbon::parse($weekStart)->subWeek()->toDateString() }}"
           class="text-white/40 hover:text-white text-sm">
            ← Prev
        </a>

        <h1 class="text-xl font-semibold">
            Week of {{ \Carbon\Carbon::parse($weekStart)->format('d M Y') }}
        </h1>

        <a href="/tasks?week={{ \Carbon\Carbon::parse($weekStart)->addWeek()->toDateString() }}"
           class="text-white/40 hover:text-white text-sm">
            Next →
        </a>
    </div>

    <!-- FORM -->
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-8 flex gap-3">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="Tambah task..."
            class="flex-1 px-4 py-3 rounded-xl bg-[#111111] border border-white/[0.08] text-sm focus:border-lime-400 outline-none"
        >

        <input
            type="date"
            name="due_date"
            class="px-3 py-3 rounded-xl bg-[#111111] border border-white/[0.08] text-white text-sm"
        >

        <button class="px-5 py-3 bg-lime-400 text-black font-semibold rounded-xl hover:bg-lime-300 transition">
            Add
        </button>
    </form>

    <!-- KANBAN -->
    <div class="grid grid-cols-3 gap-6">

        @foreach (['todo' => 'To Do', 'doing' => 'Doing', 'done' => 'Done'] as $key => $label)

            <div class="bg-[#0F0F0F] border border-white/[0.05] p-5 rounded-2xl">

                <!-- HEADER -->
                <h2 class="mb-4 font-semibold text-white/90" data-status="{{ $key }}">
                    {{ $label }} ({{ $tasks->where('status', $key)->count() }})
                </h2>

                <!-- LIST -->
                <div id="{{ $key }}" class="space-y-3 min-h-[200px]">

                    @foreach ($tasks->where('status', $key) as $task)

                        <div 
    data-id="{{ $task->id }}"
    class="bg-[#111111] hover:bg-[#1A1A1A] border border-white/[0.06] p-4 rounded-xl transition cursor-grab active:cursor-grabbing group"
>

    <!-- TITLE -->
    <input 
        value="{{ $task->title }}"
        class="bg-transparent w-full text-sm text-white/90 outline-none mb-2"
        onchange="updateTask(this)"
    >

    <!-- BOTTOM ROW -->
    <div class="flex items-center justify-between">

        <!-- DATE -->
        <input 
            type="date"
            value="{{ $task->due_date }}"
            class="bg-transparent text-xs text-white/40 outline-none"
            onchange="updateDate(this)"
        >

        <!-- DELETE (HOVER) -->
        <button 
            onclick="deleteTask({{ $task->id }}, this)"
            class="flex items-center gap-1 text-red-400 text-xs opacity-0 group-hover:opacity-100 transition hover:text-red-300"
        >
            <!-- ICON -->
            <span>🗑</span>

            <!-- TEXT -->
            <span>Delete</span>
        </button>

    </div>

</div>

                    @endforeach

                </div>

            </div>

        @endforeach

    </div>

    <!-- SCRIPT -->
    <script>
        const statuses = ['todo', 'doing', 'done'];

        function updateCounts() {
            statuses.forEach(status => {
                const column = document.getElementById(status);
                const count = column.children.length;

                const header = document.querySelector(`[data-status="${status}"]`);
                header.innerText = header.innerText.replace(/\(\d+\)/, `(${count})`);
            });
        }

        statuses.forEach(status => {
            new Sortable(document.getElementById(status), {
                group: 'tasks',
                animation: 150,
                ghostClass: 'opacity-40',

                onEnd: function (evt) {
                    let taskId = evt.item.dataset.id;
                    let newStatus = evt.to.id;

                    fetch(`/tasks/${taskId}/${newStatus}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    updateCounts();
                }
            });
        });

        function updateTask(input) {
            const card = input.closest('[data-id]');
            const taskId = card.dataset.id;

            fetch(`/tasks/${taskId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    title: input.value
                })
            });
        }

        function updateDate(input) {
            const card = input.closest('[data-id]');
            const taskId = card.dataset.id;

            fetch(`/tasks/${taskId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    due_date: input.value
                })
            });
        }

        function deleteTask(taskId, btn) {
            if (!confirm('Delete task?')) return;

            fetch(`/tasks/${taskId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => {
                btn.closest('[data-id]').remove();
                updateCounts();
            });
        }
    </script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Knowledge</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white p-8">

<h1 class="text-xl mb-6">Knowledge Hub</h1>

<!-- FORM -->
<form method="POST" action="{{ route('knowledge.store') }}" class="mb-6 space-y-3">
    @csrf

    <input name="title" placeholder="Title"
        class="w-full p-2 bg-[#111] rounded">

    <select name="type" class="w-full p-2 bg-[#111] rounded">
        <option value="course">Course</option>
        <option value="insight">Insight</option>
    </select>

    <input name="source" placeholder="Source (optional)"
        class="w-full p-2 bg-[#111] rounded">

    <textarea name="content" placeholder="Write your thoughts..."
        class="w-full p-3 bg-[#111] rounded h-32"></textarea>

    <button class="bg-lime-400 text-black px-4 py-2 rounded">
        Save
    </button>
</form>

<!-- LIST -->
<div class="space-y-4">
    @foreach ($knowledges as $item)
        <div class="p-4 bg-[#111] rounded">

            <p class="text-sm text-white/40">{{ $item->type }}</p>

            <h2 class="font-semibold">{{ $item->title }}</h2>

            @if($item->source)
                <p class="text-xs text-blue-400">{{ $item->source }}</p>
            @endif

            <p class="text-sm mt-2 text-white/70">
                {{ $item->content }}
            </p>

        </div>
    @endforeach
</div>

</body>
</html>
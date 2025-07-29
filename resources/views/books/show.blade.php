<x-app-layout>
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Year:</strong> {{ $book->year }}</p>

        <a href="{{ route('books.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Back to list</a>
    </div>
</x-app-layout>

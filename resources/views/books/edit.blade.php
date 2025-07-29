<x-app-layout>
    <div class="max-w-lg mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Book</h1>

        @if ($errors->any())
            <div class="bg-red-100 p-3 mb-4 rounded">
                <ul class="list-disc pl-5 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Title *</label>
                <input type="text" name="title" class="border p-2 w-full" value="{{ old('title', $book->title) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Author *</label>
                <input type="text" name="author" class="border p-2 w-full"
                    value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">ISBN</label>
                <input type="text" name="isbn" class="border p-2 w-full" value="{{ old('isbn', $book->isbn) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Year</label>
                <input type="number" name="year" class="border p-2 w-full" value="{{ old('year', $book->year) }}">
            </div>

            <button type="submit" class="bg-blue-600 text-blue px-4 py-2 hover:underline rounded">Update</button>
            <a href="{{ route('books.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>

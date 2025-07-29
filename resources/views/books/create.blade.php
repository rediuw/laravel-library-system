<x-app-layout>
    <div class="container mx-auto p-4 max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Add New Book</h1>

        @if ($errors->any())
            <div class="bg-red-100 p-3 mb-4 rounded">
                <ul class="list-disc pl-5 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1" for="title">Title *</label>
                <input type="text" name="title" id="title" class="border p-2 w-full" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1" for="author">Author *</label>
                <input type="text" name="author" id="author" class="border p-2 w-full" value="{{ old('author') }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1" for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="border p-2 w-full" value="{{ old('isbn') }}">
            </div>

            <div class="mb-4">
                <label class="block mb-1" for="year">Year</label>
                <input type="number" name="year" id="year" class="border p-2 w-full" value="{{ old('year') }}">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Book</button>
            <a href="{{ route('books.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>

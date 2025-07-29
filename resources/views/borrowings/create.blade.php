<x-app-layout>
    <div class="container mx-auto p-4 max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Borrow a Book</h1>

        @if ($errors->any())
            <div class="bg-red-100 p-3 mb-4 rounded">
                <ul class="list-disc pl-5 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1" for="book_id">Select Book *</label>
                <select name="book_id" id="book_id" class="border p-2 w-full" required>
                    <option value="">-- Choose a Book --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} by {{ $book->author }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-red px-4 py-2 rounded">Borrow</button>
            <a href="{{ route('borrowings.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>

<x-app-layout>
    @if (Auth::check())
        <p>Logged in as: {{ Auth::user()->email }} (Role: {{ Auth::user()->role }})</p>
    @else
        <p>Not logged in</p>
    @endif

    <div class="max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Books List</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('books.create') }}" class="bg-blue-600 text-blue hover:underline px-4 py-2 rounded">Add
                        New Book</a>
                @endif
            @endauth
        </div>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Author</th>
                    <th class="px-4 py-2 border">ISBN</th>
                    <th class="px-4 py-2 border">Year</th>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <th class="px-4 py-2 border">Actions</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td class="px-4 py-2 border">{{ $book->title }}</td>
                        <td class="px-4 py-2 border">{{ $book->author }}</td>
                        <td class="px-4 py-2 border">{{ $book->isbn }}</td>
                        <td class="px-4 py-2 border">{{ $book->year }}</td>
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('books.edit', $book) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 border text-center">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

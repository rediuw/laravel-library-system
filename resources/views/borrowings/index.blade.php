<x-app-layout>
    <div class="max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Borrowings</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Book Title</th>
                    @if (auth()->user()->role === 'admin')
                        <th class="px-4 py-2 border">Borrowed By</th>
                    @endif
                    <th class="px-4 py-2 border">Borrowed At</th>
                    <th class="px-4 py-2 border">Returned At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowings as $borrowing)
                    <tr>
                        <td class="px-4 py-2 border">{{ $borrowing->book->title }}</td>
                        @if (auth()->user()->role === 'admin')
                            <td class="px-4 py-2 border">{{ $borrowing->user->name }}</td>
                        @endif
                        <td class="px-4 py-2 border">{{ $borrowing->borrowed_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 border">
                            {{ $borrowing->returned_at ? $borrowing->returned_at->format('Y-m-d H:i') : 'Not Returned' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->role === 'admin' ? 4 : 3 }}"
                            class="px-4 py-2 border text-center">
                            No borrowings found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

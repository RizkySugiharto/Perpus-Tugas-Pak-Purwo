<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Daftar Buku</h2>
            <a href="{{ route('books.create') }}" role="button" class="bg-green-600 rounded-md text-white px-4 py-2 hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah Buku</a>
        </div>
        <table class="table-fixed border-collapse text-white w-[100%] mt-6 rounded-md">
            <thead>
                <tr>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">ID</th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Judul</th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Pengarang</th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Penerbit</th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td class="py-3 px-6 border-white border-2">{{ $book->id }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $book->title }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $book->author }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $book->publisher }}</td>
                        <td class="py-3 px-6 border-white border-2 flex flex-wrap gap-2">
                            <a href="{{ route('books.edit', $book) }}" role="button" class="bg-blue-600 rounded-md text-white px-4 py-2 hover:shadow-blue-300 hover:shadow-[0_0_7px_3px]">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 rounded-md text-white px-4 py-2 hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-layout>

<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Detail Buku</h2>
            <a href="{{ route('books.index') }}" class="text-white font-medium text-4xl"> < </a>
        </div>
        <div class="mt-6">
            <div class="flex flex-col sm:flex-row">
                <img src="{{ $book->getCoverUrl() }}" alt="Cover" class="w-[20rem] h-[28rem] object-cover rounded-lg">
                <div class="flex flex-col justify-between sm:ms-6 mt-6 sm:mt-0 w-full">
                    <div class="text-white text-md font-comic-sans">
                        <p class="text-4xl mb-4">{{ $book->title }}</p>
                        <p>Pengarang: [ {{ $book->author }} ]</p>
                        <p>Penerbit: [ {{ $book->publisher }} ]</p>
                        <p>Tanggal Terbit: [ {{ $book->published_date->format('d/m/Y') }} ]</p>
                    </div>
                    <div class="mt-6 space-y-3">
                        <a href="" role="button" class="flex flex-row justify-center text-white w-full bg-blue-600 px-4 py-2 rounded-md hover:shadow-[0px_0px_9px_3px_white] hover:font-semibold">Request Peminjaman</a>
                        <div class="flex flex-row space-x-3">
                            <a href="{{ route('books.edit', $book) }}" role="button" class="flex flex-row justify-center text-white w-full bg-blue-600 px-4 py-2 rounded-md hover:shadow-[0px_0px_9px_3px_white] hover:font-semibold">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="post" class="w-full">
                                @method('delete')
                                @csrf
                                <button class="flex flex-row justify-center text-white w-full bg-red-600 px-4 py-2 rounded-md hover:shadow-[0px_0px_9px_3px_white] hover:font-semibold">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="h-[3px] bg-white border-none rounded-lg my-5">
            <div class="text-white text-md">
                <p class="text-3xl mb-3">Deskripsi Buku:</p>
                <p>{{ $book->description }}</p>
            </div>
        </div>
    </main>
</x-layout>

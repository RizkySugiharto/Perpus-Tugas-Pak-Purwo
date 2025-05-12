<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Edit Buku</h2>
        </div>
        <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data" class="p-4 bg-secondary rounded-lg mt-6 shadow-primary shadow-[0_0_16px_4px] space-y-2">
            @method('put')
            @csrf
            <div class="space-y-1 flex flex-row">
                <label for="cover_file" class="text-white">
                    <p class="m-0 mb-1">Foto Cover Buku</p>
                    <img id="preview-cover_file" src="{{ $book->getCoverUrl() }}" alt="" class="w-[20rem] h-[28rem] object-cover rounded-lg hover:cursor-pointer" title="Select an image">
                </label>
                <input type="file" accept="image/*" name="cover_file" id="cover_file" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3 w-full" style="display: none" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="title" class="text-white">Judul</label>
                <input type="text" name="title" id="title" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $book->title }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="author" class="text-white">Pengarang</label>
                <input type="text" name="author" id="author" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $book->author }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="publisher" class="text-white">Penerbit</label>
                <input type="text" name="publisher" id="publisher" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $book->publisher }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="published_date" class="text-white">Tanggal Terbit</label>
                <input type="date" name="published_date" id="published_date" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $book->published_date->format('Y-m-d') }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="description" class="text-white">Deskripsi Buku</label>
                <textarea name="description" id="description" rows="10" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3 resize-none" required>{{ $book->description }}</textarea>
            </div>
            <div class="space-x-4 flex flex-row mt-2">
                <button class="bg-blue-600 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-blue-300 hover:shadow-[0_0_7px_3px]">Simpan</button>
                <a href="{{ route('books.show', $book) }}" role="button" class="bg-red-500 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Batalkan</a>
            </div>
        </form>
    </main>
    <x-slot:scripts>
        <script>
            const inputCoverFile = document.getElementById('cover_file');
            const previewCoverFile = document.getElementById('preview-cover_file');

            inputCoverFile.addEventListener('change', () => {
                const crrntFile = inputCoverFile.files[0];
                previewCoverFile.src = URL.createObjectURL(crrntFile);
                previewCoverFile.alt = crrntFile.name;
            })
        </script>
    </x-slot:scripts>
</x-layout>

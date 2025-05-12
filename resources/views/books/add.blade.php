<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Tambah Buku</h2>
        </div>
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data" class="p-4 bg-secondary rounded-lg mt-6 shadow-primary shadow-[0_0_16px_4px] space-y-2">
            @csrf
            <div class="space-y-1 flex flex-row">
                <label for="cover_file" class="text-white">
                    <p class="m-0 mb-1">Foto Cover Buku</p>
                    <img id="preview-cover_file" src="data:image/png;base64,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" alt="" class="w-[20rem] h-[28rem] object-cover rounded-lg" title="Select an image">
                </label>
                <input type="file" accept="image/*" name="cover_file" id="cover_file" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3 w-full" style="display: none" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="title" class="text-white">Judul</label>
                <input type="text" name="title" id="title" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="author" class="text-white">Pengarang</label>
                <input type="text" name="author" id="author" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="publisher" class="text-white">Penerbit</label>
                <input type="text" name="publisher" id="publisher" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="published_date" class="text-white">Tanggal Terbit</label>
                <input type="date" name="published_date" id="published_date" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="description" class="text-white">Deskripsi Buku</label>
                <textarea name="description" id="description" rows="10" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3 resize-none" required></textarea>
            </div>
            <div class="space-x-4 flex flex-row mt-2">
                <button class="bg-green-600 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah</button>
                <a href="{{ route('books.index') }}" role="button" class="bg-red-500 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Batalkan</a>
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

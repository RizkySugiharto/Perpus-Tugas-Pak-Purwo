<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Tambah Peminjaman</h2>
        </div>
        <form action="{{ route('loans.store') }}" method="post" class="p-4 bg-secondary rounded-lg mt-6 shadow-primary shadow-[0_0_16px_4px] space-y-2">
            @csrf
            <div class="space-y-1 flex flex-col">
                <label for="book_id" class="text-white">Pilih Buku</label>
                <select name="book_id" id="book_id" class="caret-black text-black bg-white rounded-sm text-[20px] py-2 px-3">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="student_id" class="text-white">Pilih Siswa</label>
                <select name="student_id" id="student_id" class="caret-black text-black bg-white rounded-sm text-[20px] py-2 px-3">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="space-x-4 flex flex-row mt-2">
                <button class="bg-green-600 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah</button>
                <a href="{{ route('loans.index') }}" role="button" class="bg-red-500 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Batalkan</a>
            </div>
        </form>
    </main>
</x-layout>

<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Daftar Peminjaman</h2>
            <a href="{{ route('loans.create') }}" role="button" class="bg-green-600 rounded-md text-white px-4 py-2 hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah Peminjaman</a>
        </div>
        <table class="table-fixed border-collapse text-white w-[100%] mt-6 rounded-md">
            <thead>
                <tr>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">ID</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Nama Siswa</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Kelas Siswa</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Nama Petugas</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Judul Buku</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Aksi</th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td class="py-3 px-6 border-white border-2">{{ $loan->id }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $loan->student_name }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $loan->student_class }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $loan->user_name }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $loan->book_title }}</td>
                        <td class="py-3 px-6 border-white border-2 flex flex-wrap gap-2">
                            <form action="{{ route('loans.destroy', $loan) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 rounded-md text-white px-4 py-2 hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('loans.restore') }}" method="post" class="mt-8">
                @method('put')
                @csrf
                <button class="bg-red-500 rounded-md text-white px-4 py-2 hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Pulihkan Semua Peminjaman</button>
            </form>
    </main>
</x-layout>

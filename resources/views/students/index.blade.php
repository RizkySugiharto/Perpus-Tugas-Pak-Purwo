<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Daftar Siswa</h2>
            <a href="{{ route('students.create') }}" role="button" class="bg-green-600 rounded-md text-white px-4 py-2 hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah Siswa</a>
        </div>
        <table class="table-fixed border-collapse text-white w-[100%] mt-6 rounded-md">
            <thead>
                <tr>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">ID</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">NIS</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Nama</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Kelas</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Alamat</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">No. Telephone</th></th>
                    <th class="py-3 px-6 border-white border-2 bg-gray-800">Aksi</th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="py-3 px-6 border-white border-2">{{ $student->id }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $student->nis }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $student->name }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $student->class }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $student->address }}</td>
                        <td class="py-3 px-6 border-white border-2">{{ $student->phone_number }}</td>
                        <td class="py-3 px-6 border-white border-2 flex flex-wrap gap-2">
                            <a href="{{ route('students.edit', $student) }}" role="button" class="bg-blue-600 rounded-md text-white px-4 py-2 hover:shadow-blue-300 hover:shadow-[0_0_7px_3px]">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="post">
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

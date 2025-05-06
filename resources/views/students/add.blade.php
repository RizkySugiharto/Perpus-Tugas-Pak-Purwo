<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Tambah Siswa</h2>
        </div>
        <form action="{{ route('students.store') }}" method="post" class="p-4 bg-secondary rounded-lg mt-6 shadow-primary shadow-[0_0_16px_4px] space-y-2">
            @csrf
            <div class="space-y-1 flex flex-col">
                <label for="nis" class="text-white">NIS</label>
                <input type="text" name="nis" id="nis" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="name" class="text-white">Nama</label>
                <input type="text" name="name" id="name" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="class" class="text-white">Kelas</label>
                <input type="text" name="class" id="class" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="address" class="text-white">Alamat</label>
                <input type="text" name="address" id="address" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="phone_number" class="text-white">No. Telephone</label>
                <input type="text" name="phone_number" id="phone_number" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-x-4 flex flex-row mt-2">
                <button class="bg-green-600 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah</button>
                <a href="{{ route('students.index') }}" role="button" class="bg-red-500 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Batalkan</a>
            </div>
        </form>
    </main>
</x-layout>

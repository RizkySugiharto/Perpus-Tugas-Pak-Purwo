<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Edit Petugas</h2>
        </div>
        <form action="{{ route('users.update', $user) }}" method="post" class="p-4 bg-secondary rounded-lg mt-6 shadow-primary shadow-[0_0_16px_4px] space-y-2">
            @method('put')
            @csrf
            <div class="space-y-1 flex flex-col">
                <label for="name" class="text-white">Nama</label>
                <input type="text" name="name" id="name" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $user->name }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="email" class="text-white">Email</label>
                <input type="email" name="email" id="email" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3" value="{{ $user->email }}" required>
            </div>
            <div class="space-y-1 flex flex-col">
                <label for="password" class="text-white">Password</label>
                <input type="password" name="password" id="password" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
            </div>
            <div class="space-x-4 flex flex-row mt-2">
                <button class="bg-blue-600 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-blue-300 hover:shadow-[0_0_7px_3px]">Simpan</button>
                <a href="{{ route('users.index') }}" role="button" class="bg-red-500 rounded-md mt-7 text-white px-6 py-3 font-funtastic tracking-wider text-[18px] hover:shadow-red-300 hover:shadow-[0_0_7px_3px]">Batalkan</a>
            </div>
        </form>
    </main>
</x-layout>

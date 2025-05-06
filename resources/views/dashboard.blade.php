<x-layout>
    @include('components.header')
    <main class="p-8">
        <p class="text-white font-comic-sans font-semibold text-[20px]">Selamat datang, {{ $user->name }}</p>
        <div class="grid gap-6 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 mt-12">
            <div class="bg-secondary border-3 border-white rounded-md flex flex-col gap-y-1 p-4 hover:bg-primary hover:scale-102 lg:pb-10">
                <p class="text-white font-comic-sans font-semibold text-[18px]">Jumlah Buku</p>
                <p class="text-white font-comic-sans font-medium text-[16px]">{{ $countBooks }}</p>
            </div>
            <div class="bg-secondary border-3 border-white rounded-md flex flex-col gap-y-1 p-4 hover:bg-primary hover:scale-102 lg:pb-10">
                <p class="text-white font-comic-sans font-semibold text-[18px]">Jumlah Siswa</p>
                <p class="text-white font-comic-sans font-medium text-[16px]">{{ $countStudents }}</p>
            </div>
            <div class="bg-secondary border-3 border-white rounded-md flex flex-col gap-y-1 p-4 hover:bg-primary hover:scale-102 lg:pb-10">
                <p class="text-white font-comic-sans font-semibold text-[18px]">Jumlah Petugas</p>
                <p class="text-white font-comic-sans font-medium text-[16px]">{{ $countUsers }}</p>
            </div>
            <div class="bg-secondary border-3 border-white rounded-md flex flex-col gap-y-1 p-4 hover:bg-primary hover:scale-102 lg:pb-10">
                <p class="text-white font-comic-sans font-semibold text-[18px]">Jumlah Peminjaman</p>
                <p class="text-white font-comic-sans font-medium text-[16px]">{{ $countLoans }}</p>
            </div>
        </div>
    </main>
</x-layout>

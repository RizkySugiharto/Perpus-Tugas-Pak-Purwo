<header class="bg-black border-b-2 border-primary shadow-primary shadow-[0_0_10px_5px] px-6 py-4 flex flex-row justify-between items-center">
    <a href="{{ route('dashboard') }}" class="font-funtastic text-[27px] text-white">Perpustakaan</a>
    <nav class="flex flex-row justify-evenly items-center space-x-5">
        <a href="{{ route('books.index') }}" class="font-comic-sans text-[17px] text-white hover:text-shadow-white hover:text-shadow-[0_0_7px] active:text-primary">Buku</a>
        <a href="{{ route('users.index') }}" class="font-comic-sans text-[17px] text-white hover:text-shadow-white hover:text-shadow-[0_0_7px] active:text-primary">Pengguna</a>
        <a href="{{ route('loans.index') }}" class="font-comic-sans text-[17px] text-white hover:text-shadow-white hover:text-shadow-[0_0_7px] active:text-primary">Peminjaman</a>
        <a href="{{ route('logout') }}" class="font-comic-sans text-[17px] text-white hover:text-shadow-white hover:text-shadow-[0_0_7px] active:text-primary">Logout</a>
    </nav>
</header>

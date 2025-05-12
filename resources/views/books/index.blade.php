<x-layout>
    @include('components.header')
    <main class="p-8">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-funtastic text-[21px] text-white">Katalog Buku</h2>
            <a href="{{ route('books.create') }}" role="button" class="bg-green-600 rounded-md text-white px-4 py-2 hover:shadow-green-300 hover:shadow-[0_0_7px_3px]">Tambah Buku</a>
        </div>
        <form action="{{ route('books.index') }}" method="get" class="flex flex-wrap gap-3 mt-4 text-white font-comic-sans">
            <div class="flex flex-col gap-y-2">
                <label for="sort-by">Sort By</label>
                <select name="sort-by" id="sort-by" class="border-2 broder-white px-3 py-1 rounded-md" onchange="javascript:this.form.submit()">
                    @foreach (['id', 'title', 'author', 'publisher', 'published_date'] as $value)
                        <option value="{{ $value }}" class="bg-black" {{ isset($_GET['sort-by']) && ($_GET['sort-by'] == $value) ? 'selected' : '' }}>{{ ucwords(str_replace('_', ' ', $value)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="filter-by-date">Filter By Date</label>
                <input type="text" name="filter-by-date" id="filter-by-date" value="{{ isset($_GET['filter-by-date']) ? $_GET['filter-by-date'] : '' }}" class="border-2 broder-white px-3 py-1 rounded-md">
            </div>
        </form>
        <div class="flex flex-wrap gap-3 mt-6">
            @foreach ($books as $book)
                <a href="{{ route('books.show', $book) }}" class="decoration-0">
                    <div class="bg-black border-3 border-primary rounded-lg w-[17rem] overflow-clip hover:border-white hover:shadow-[0px_0px_8px_3px_white]">
                        <img src="{{ $book->getCoverUrl() }}" alt="Cover" class="h-[18rem] w-full object-cover">
                        <p class="pt-2 px-4 text-white text-[20px] truncate">{{ $book->title }}</p>
                        <p class="pt-1 pb-2 px-4 text-gray-500 text-[16px] truncate">By: {{ $book->author }}</p>
                        <p class="py-2 px-4 text-gray-500 text-[12px] text-end">{{ $book->published_date->format('d/m/Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
    <x-slot:scripts>
        <script>
            $('#filter-by-date').daterangepicker({
                showDropdowns: true,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('#filter-by-date').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                $(this).closest('form').submit();
            })
            $('#filter-by-date').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $(this).closest('form').submit();
            });
        </script>
    </x-slot:scripts>
</x-layout>

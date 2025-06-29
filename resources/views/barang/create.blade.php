<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mt-4 mb-4">Tambah Barang</h1>
        <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block font-semibold">Nama Barang</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="w-full border rounded px-3 py-2 required:">
                @error('nama')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="kode" class="block font-semibold">Kode Barang</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                    class="w-full border rounded px-3 py-2 required:">
                @error('kode')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="stok" class="block font-semibold">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok') }}"
                    class="w-full border rounded px-3 py-2 required:">
                @error('stok')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="deskripsi" class="block font-semibold">Deskripsi Barang</label>
                <textarea type="text" name="deskripsi" id="deskripsi" rows="3"
                    class="w-full border rounded px-3 py-2 required">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-right">
                <a href="{{ route('barang.index') }}"
                    class="px-4 py-2.5 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>

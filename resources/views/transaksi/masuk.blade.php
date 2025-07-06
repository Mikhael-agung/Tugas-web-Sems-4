<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semubold text-xl text-gray-800 leading-tight">
            Transaksi Masuk
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
    </div>

    <div class="max-w-5xl mx-auto">
        <form action="{{ route('transaksi.store.masuk') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="barang_id">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="w-full mt-1 border rounded">
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barang as $item)
                        <option value="{{ $item->id }}" @selected(old('barang_id') == $item->id)>
                            {{ $item->nama }} (stok: {{ $item->stok }})
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <div>
                    <label for="jumlah">Jumlah Masuk</label>
                    <input type="number" name="jumlah" id="jumlah"
                        class="w-full mt-1 border rounded{{ old('jumlah') }}"></input>
                    @error('jumlah')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="keterangan">keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="w-full mt-1 border rounded">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        simpan transaksi
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>

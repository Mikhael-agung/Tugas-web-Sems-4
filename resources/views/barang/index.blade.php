<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Barang
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font bold mt-4"> Daftar Barang </h1>
        <div class="mb-4 text-right">
            <a href="{{ route('barang.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Tambah Barang
            </a>
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Kode</th>
                    <th class="p-2 border">Stok</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $index => $barang)
                    <tr>
                        <td class="border p-2">{{ $index + 1 }}</td>
                        <td class="border p-2">{{ $barang->nama }}</td>
                        <td class="border p-2">{{ $barang->kode }}</td>
                        <td class="border p-2">{{ $barang->stok }}</td>
                        <td class="border p-2 text-center">
                            <div>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-600 hover:underline">
                                    Edit </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

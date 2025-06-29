<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Selamat datang di Gudangin 👋</h1>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-lg font-semibold">Total Barang</h2>
                <p class="text-3xl">{{ $barangCount }}</p>
            </div>
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-lg font-semibold">Stok Menipis</h2>
                <p class="text-3xl text-red-600">{{ $stokMenipis }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

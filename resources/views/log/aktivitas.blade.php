<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Log Aktivitas
        </h2>
    </x-slot>

    <div class="container space-y-4 mx-auto mt-4">
        @foreach ($logs as $log)
            
            <div class="border-l-4 border-blue-600 bg-white shadow-sm p-4 rounded-md">
                <div class="flex items-center justify-between text-sm text-gray-500 mb-1">
                    <span class="font-semibold text-blue-600">{{ $log->aksi }}</span>
                    <span>{{ $log->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="text-sm text-gray-800">
                    <span class="font-medium text-slate-700">{{ $log->user_name }}</span>
                </div>
                <div class="mt-2 text-gray-700 text-sm leading-relaxed">
                    {{ $log->keterangan }}
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

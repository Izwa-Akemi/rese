<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           店舗管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <div class="flex justify-end mb-4">
                        <button onclick="location.href='{{ route('owner.stores.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
                    </div>
                    <div class="md:flex md:flex-wrap">
                        @foreach($stores as $store)
                        <div class="md:w-1/4 p-2 md:p-4">
                            <a href="{{ route('owner.stores.edit',['store' => $store->id ])}}">
                                <div class="border rounded-md p-2 md:p-4">
                                    <img src="/storage/shops/{{$store->filename}}" alt="">
                                    <div class="text-gray-700 p-2">{{ $store->name }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
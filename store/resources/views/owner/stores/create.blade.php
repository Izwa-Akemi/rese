<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            店舗新規登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('owner.stores.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">店舗名</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">店舗画像</label>
                                    <input type="file" id="image" name="image" value="{{ old('image') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="area_id" class="leading-7 text-sm text-gray-600">エリア名</label>
                                    <select name="area_id" id="area_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @foreach($areas as $area)
                                        <option value="{{ $area->id}}">
                                            {{ $area->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="genre_id" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                                    <select name="genre_id" id="genre_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @foreach($genres as $genre)
                                        <option value="{{ $genre->id}}">
                                            {{ $genre->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @auth
                            <input type="hidden" name="owner_id" value="{{ Auth::user()->id }}">
                            @endauth
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="detail" class="leading-7 text-sm text-gray-600">店舗情報　※必須</label>
                                    <textarea id="detail" name="detail" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('detail') }}</textarea>
                                </div>
                            </div>
                            <div class="p-2 w-full flex justify-around mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.stores.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
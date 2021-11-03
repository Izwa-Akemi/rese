<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メール作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('owner.rese.update',['rese' => $reserve->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="-m-2">
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="subject" class="leading-7 text-sm text-gray-600">件名</label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">宛先メールアドレス</label>
                                    <input type="hidden" id="email" name="email" value="{{$reserve->user->email}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <p class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $reserve->user->email }}　（{{$reserve->user->name}} 様）</p>
                                </div>
                            </div>
                            @auth
                            <input type="hidden" name="owner_id" value="{{ Auth::user()->id }}">
                            @endauth
                            <div class="p-2 sm:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="detail" class="leading-7 text-sm text-gray-600">メール本文</label>
                                    <textarea id="detail" name="detail" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

予約詳細
店名：{{$reserve->store->name}}
予約日：{{$reserve->reserve_date->format('Y年m月d日')}}
予約時間{{$reserve->reserve_date->format('H時i分')}}
予約人数{{$reserve->people}}人
                                    </textarea>
                                </div>
                            </div>
                            <div class="p-2 w-full flex justify-around mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.rese.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            終了した予約一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100 rounded-tl rounded-bl">ユーザー名</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">店舗名</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">予約日時</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100 hidden md:block">人数</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reserve_old as $key=>$old)
                                        <tr>
                                            <td class="px-4 py-3">{{$old->user->name}}</td>
                                            <td class="px-4 py-3">{{$old->store->name}}</td>
                                            <td class="px-4 py-3">{{$old->reserve_date->format('Y/m/d H:i')}}</td>
                                            <td class="px-4 py-3 hidden md:block">{{$old->people}}人</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
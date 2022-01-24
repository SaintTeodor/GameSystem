<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Games List</div>

                    <div style="padding-left: 790px; padding-top: 3px">
                        <form action="/searchhome" method="get">
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                        <button type="submit" class="rounded border border-blue-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Search</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Game</th>
                        <th class="text-left p-3 px-5">Release Date</th>
                        <th class="text-left p-3 px-5">Developer</th>
                        <th class="text-left p-3 px-5">Genre</th>
                        <th class="text-left p-3 px-5">Uploaded On</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                <h5> {{$game->description}}  </h5>
                            </td>
                            <td class="p-3 px-5">
                                <h5>{{$game->relyear}} </h5>
                            </td>
                            <td class="p-3 px-5">
                                <h5>{{$game->developer->dev}} </h5>
                            </td>
                            <td class="p-3 px-5">
                                <h5>{{$game->genre->genrename}} </h5>
                            </td>
                            <td class="p-3 px-5">
                                <h5>{{$game->created_at}} </h5>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Screenshots</div>

                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">

                        <th class="text-left p-3 px-5">Screenshot</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($img as $image)
                        <tr class="border-b hover:bg-orange-100">

                            <td><img src="{{$image->url}}" width="400px"></td><th class="text-left p-3 px-5">Uploaded on: {{$image->created_at}}</th>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

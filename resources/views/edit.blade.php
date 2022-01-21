<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/game/{{ $game->id }}">

                    <div class="form-group">
                        <h3>Game Name</h3>
                        <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$game->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        <h3>Release year</h3>
                        <textarea name="relyear" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$game->relyear }}</textarea>
                        @if ($errors->has('relyear'))
                            <span class="text-danger">{{ $errors->first('relyear') }}</span>
                        @endif
                        <h3>Genre Name(id)</h3>
                        <textarea name="genre_id" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" >{{$game->genre->genre_id}}</textarea>
                        @if ($errors->has('genre_id'))
                            <span class="text-danger">{{ $errors->first('genre_id') }}</span>
                        @endif
                        <h3>Developer Name(id)</h3>
                        <textarea name="dev_id" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" >{{$game->developer->dev_id}}</textarea>
                        @if ($errors->has('dev_id'))
                            <span class="text-danger">{{ $errors->first('dev_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 rounded border border-gray-400 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update game</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

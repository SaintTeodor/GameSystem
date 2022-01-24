<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/game">

                    <div class="form-group">
                        <!-- GAME NAME -->
                        <h3><strong>Game Name</strong></h3>
                        <textarea name="description" class="bg-gray-800 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: StarCraft'></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    <!-- RELEASE YEAR -->
                        <h3><strong>Release Year</strong></h3>
                        <textarea name="relyear" class="bg-gray-800 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: Year-Month-Day/1998-08-22'></textarea>
                        @if ($errors->has('relyear'))
                            <span class="text-danger">{{ $errors->first('relyear') }}</span>
                        @endif
                    <!-- DEVELOPER -->
                        <h3><strong>Developer Name</strong></h3>
                        <textarea name="dev_id" class="bg-gray-8000 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: 1 (for Blizzard Entertainment)'></textarea>
                        @if ($errors->has('dev_id'))
                            <span class="text-danger">{{ $errors->first('dev_id') }}</span>
                        @endif
                        <select class="form-group">
                            <option disabled selected>Already Existing Genres (id in ascending order)</option>
                            @foreach($dev as $devs)
                                <option disabled value="{{$devs->devid}}" >{{$devs->dev_id}}, {{$devs->dev}}</option>
                            @endforeach
                        </select>
                        <!-- GENRE -->
                        <h3><strong>Genre Name</strong></h3>
                        <textarea name="genre_id" class="bg-gray-800 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: 1 (for Horror)'></textarea>
                        @if ($errors->has('genre_id'))
                            <span class="text-danger">{{ $errors->first('genre_id') }}</span>
                        @endif
                        <select class="form-group">
                            <option disabled selected>Already Existing Genres (id in ascending order)</option>
                            @foreach($genre as $genres)
                                <option disabled value="{{$genres->genid}}" >{{$genres->genre_id}}, {{$genres->genrename}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div class="form-group">
                        <button type="submit" class="rounded border border-gray-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add Game</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

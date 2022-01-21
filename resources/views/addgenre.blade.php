<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Genre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/addgenre">

                    <div class="form-group">
                        <h3><strong>Genre name</strong></h3>
                        <textarea name="genrename" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter genre name'></textarea>
                        @if ($errors->has('genrename'))
                            <span class="text-danger">{{ $errors->first('genrename') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="rounded border border-gray-400 bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Add Genre</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

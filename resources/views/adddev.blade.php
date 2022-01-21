<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Developer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/adddev">

                    <div class="form-group">
                        <h3><strong>Developer Name</strong></h3>
                        <textarea name="dev" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: Blizzard Entertainment'></textarea>
                        @if ($errors->has('dev'))
                            <span class="text-danger">{{ $errors->first('dev') }}</span>
                        @endif
                        <h3><strong>Founded</strong></h3>
                        <textarea name="foundyear" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Example: Year-Month-Day/1998-08-22'></textarea>
                        @if ($errors->has('foundyear'))
                            <span class="text-danger">{{ $errors->first('foundyear') }}</span>
                        @endif

                    </div>

                    <div class="form-group">
                        <button type="submit" class="rounded border border-gray-400 bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Add Developer</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

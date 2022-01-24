<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload image') }}
        </h2>
    </x-slot>

    <div class="container" style="background-color:white;">

        <div class="panel panel-primary" style="display: flex; justify-content: center">
            <div class="panel-heading"><h2><strong>Upload your screenshot: </strong></h2></div>
            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="rounded border border-gray-400 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Upload</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>


@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class=" mt-2 rounded-lg mb-4 text-lg ">
                <h2> Leave a Post!</h2>
            </div>

            @if(session('status'))
                <div class="text-white text-center mt-2 bg-yellow-500 p-4 rounded-lg mb-6 text-md ">
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="post">
                
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" placeholder="Type Something!" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('bdoy') border-red-400 @enderror"></textarea>

                    @error('body')
                    <div class="text-red-500 mt-2 text-sm ">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>
            
        </div>
        </div>
    
    </div>

@endsection
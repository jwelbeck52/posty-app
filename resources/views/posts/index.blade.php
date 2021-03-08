@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class=" mt-2 rounded-lg mb-4 text-lg ">
                <h2> Post Something!</h2>
            </div>

            @if(session('status'))
                <div class="text-white text-center mt-2 bg-yellow-500 p-4 rounded-lg mb-6 text-md ">
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="post" class="mb-4">
                
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" placeholder="Type Something!" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg resize-none @error('body') border-red-400 @enderror"></textarea>

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

            <div class="rounded-lg mb-2 mt-2 text-lg ">
                <h2>Recent Posts</h2>
            </div>

            @if($posts->count())
                <div>
                    @foreach($posts as $post)
                        <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a><span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2"> {{ $post->body }}</p>

                        <div>
                            <form action="{{ route('posts.delete', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        </div>   

                        <div class="flex items-center">
                            @auth
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('like.add', $post) }}" method="post" class="mr-1"> <!-- No need for $post->id, just $post because of route-model binding-->
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                <form action="{{ route('like.remove', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                            @endif
                            @endauth
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>

                        
                        </div>
                    @endforeach

                    {{ $posts->links() }}
                </div>
            @else
                <p>There are no posts</p>
            @endif
            
        </div>
        </div>
    
    </div>

@endsection
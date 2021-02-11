@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/12 bg-white p-6 rounded-lg">

            <div class=" mt-2 p-4 text-center rounded-lg mb-4 text-lg ">
                <h2> Log Into Your Account</h2>
            </div>

            @if(session('status'))
                <div class="text-white text-center mt-2 bg-yellow-500 p-4 rounded-lg mb-6 text-md ">
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="post">
                
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')border-red-400 @enderror"
                    value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm ">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>
              
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red-400 @enderror">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm ">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember"> Remember Me</label>
                    </div>
                </div>

                <div>
                    <button class=" bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Login
                    </button>
                </div>
            </form>
        </div>
    
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">

            <div class=" mt-2 p-4 text-center rounded-lg mb-4 text-lg ">
                <h2> Create Your Account</h2>
            </div>

            <form action="{{ route('register.store') }}" method="post">
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')border-red-400 @enderror"
                    value="{{ old('name') }}">

                    @error('name')
                    <div class="text-red-500 mt-2 text-sm ">
                    <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>
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
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your Username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')border-red-400 @enderror"
                    value="{{ old('username') }}" >

                    @error('username')
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
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                    placeholder="Your Password Again" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password')border-red-400 @enderror">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm ">
                    <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div>
                    <button class=" bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Register
                    </button>
                </div>
            </form>
        </div>
    
    </div>

@endsection
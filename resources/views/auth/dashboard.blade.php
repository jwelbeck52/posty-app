@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="mb-2">DASHBOARD</h1>
            <p>Welcome, {{ Auth::user()->name }}</p>
           
        </div>
    
    </div>

@endsection
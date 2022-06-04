@extends('layouts.app')

@section('content')
<form class="bg-white lg:w-1/2 md:w-auto mx-auto rounded-lg p-5 " method="POST" action="{{ route('login') }}">
    @csrf
    <img src="{{ asset('assets/image/nav.png') }}" class="mx-auto" width="150">
    <div class="mb-6">
        <label for="email" class="block mb-2  font-medium text-black @error('email') text-red-600 @enderror">Email</label>
        <input type="email" name="email" id="email" class="shadow-sm bg-white text-black @error('password') border-red-600 @enderror border  rounded-lg  block w-full p-2.5">
        @error('email')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2  font-medium text-black @error('password') text-red-600 @enderror">Password</label>
        <input type="password" name="password" id="password" class="shadow-sm  @error('password') border-red-600 @enderror text-black bg-white  t rounded-lg  block w-full p-2.5">
        @error('password')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
        </div>
        <label for="remember" class="ml-2  font-medium text-gray-900 ">Remember Me</label>
    </div>
    <div class="text-center">
    <button type="submit" class="text-white bg-gradient-to-r w-96 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg px-5 py-2.5 text-center mr-2 mb-2">Login</button>
</div>
</form>

@endsection

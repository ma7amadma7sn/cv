@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" class="bg-white lg:w-1/2 md:w-auto mx-auto rounded-lg p-5" method="POST" action="{{ route('register') }}">
    @csrf
    <img src="{{ asset('assets/image/nav.png') }}" class="mx-auto" width="150">
    <div class="mb-6">
        <label for="name" class="block mb-2  font-medium text-black @error('name') text-red-600 @enderror">name</label>
        <input type="text" name="name" id="name" class="shadow-sm bg-white text-black @error('name') border-red-600 @enderror border  rounded-lg  block w-full p-2.5">
        @error('name')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2  font-medium text-black @error('email') text-red-600 @enderror">Email</label>
        <input type="email" name="email" id="email" class="shadow-sm bg-white text-black @error('email') border-red-600 @enderror border  rounded-lg  block w-full p-2.5">
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
    <div class="mb-6">
        <label for="password-confirm" class="block mb-2  font-medium text-black">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="shadow-sm text-black bg-white rounded-lg block w-full p-2.5">
    </div>
    <div class="mb-6">
        <label for="job" class="block mb-2 font-medium text-black @error('job') text-red-600 @enderror">Job</label>
        <input type="text" name="job" id="job" class="shadow-sm @error('job') border-red-600 @enderror text-black bg-white  t rounded-lg  block w-full p-2.5">
        @error('job')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="age" class="block mb-2 font-medium text-black @error('age') text-red-600 @enderror">Age</label>
        <input type="number" name="age" id="age" class="shadow-sm @error('age') border-red-600 @enderror text-black bg-white  t rounded-lg  block w-full p-2.5">
        @error('age')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
<label for="countries" class="block mb-2 font-medium text-black @error('age') text-red-600 @enderror">Gender</label>
<select name="gender" id="countries" class="text-black bg-white text-black @error('gender') border-red-600 @enderror rounded-lg  block w-full p-2.5">
<option selected=""></option>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
@error('gender')
<p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
@enderror
    </div>
    <div class="mb-6">
        <div class="flex justify-center items-center w-full">
            <label for="dropzone-file" class="flex flex-col justify-center @error('cv') border-red-600 @enderror  items-center w-full h-30 bg-gray-50 rounded-lg border-2 border-dashed cursor-pointerhover:bg-gray-100">
                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                    <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG</p>
                </div>
                <input id="dropzone-file" name="cv" type="file" class="hidden" />
            </label>
        </div> 
        @error('cv')
        <p id="filled_success_help" class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="text-center">
    <button type="submit" class="text-white w-96 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg  px-5 py-2.5 text-center mr-2 mb-2">Register</button>
</div>
</form>
@endsection

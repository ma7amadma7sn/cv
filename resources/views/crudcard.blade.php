<div>
    <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($users as $user)  
    <div class=" bg-white relative drop-shadow-2xl border-solid rounded-lg border border-gray-200 shadow-md">
        <a target="_blank" @if(Auth::user()->rule === 1) href="upload/{{ $user->cv }}" @endif>
            @if($user->gender === 1)
            <img class="rounded-t-lg mx-auto" width="200" src="{{ asset('assets/image/man.png') }}" /> 
            @else
            <img class="rounded-t-lg mx-auto" width="200" src="{{ asset('assets/image/wman.png') }}" /> 
            @endif
        </a>
        @if(Auth::user()->rule === 1)
        <button type="button" class="text-white absolute top-0 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center mr-2 mb-2" onclick="toggle({{$user->id}})" id="openModal">
            <img src="{{ asset('assets/icon/delete.svg') }}" width="20">
        </button>
        @if($user->status === 1 || $user->status === 2 && Auth::user()->rule === 1)
        <button type="button" class="text-white absolute right-0 top-0 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300: shadow-lg shadow-purple-500/50 font-medium rounded-lg text-sm px-2 py-2.5 text-center mb-2" onclick="update({{$user->id}})" id="openModalUpdate">
            <img src="{{ asset('assets/icon/pen.svg') }}" width="20">
        </button>
        @endif
        @endif
        <div class="p-5">
            <a href="#" class="flex">
                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900">Name : {{ $user->name }}</h5>
                <img class="ml-1 w-6 h-6" src="{{ asset('assets/image/'.$user->status.'.png') }}" >
            </a>
            <p class="mb-1 font-normal text-gray-700">Job : {{ $user->job }}</p>
            <p class="mb-3 font-normal text-gray-700">Age : {{ $user->age }}</p>
            @if ($user->status === 1)
            <p class="mb-3 font-normal text-gray-700">Congratulations, you have been accepted</p>
            @endif
            @if ($user->status === 3)
            <p class="mb-3 font-normal text-gray-700">We haven't decided yet</p>
            @endif
            @if ($user->status === 2)
            <p class="mb-3 font-normal text-gray-700">Unfortunately, you were not accepted</p>
            @endif
            <div class="text-center">
                @if($user->status === 3 && Auth::user()->rule === 1)
            <button  wire:click="rejected({{ $user->id }})" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 shadow-lg shadow-red-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                <img src="{{ asset('assets/icon/2.svg') }}" width="20">
            </button>
            <button wire:click="accept({{ $user->id }})" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                <img src="{{ asset('assets/icon/1.svg') }}" width="20">
            </button>
            @endif
        </div>
            
      </div>
    </div>
    {{-- modal delete user --}}
    <div wire:ignore.self class="bg-black bg-opacity-50 inset-0 hidden z-50	top-0 right-0 left-0 overflow-y-auto fixed justify-center items-center" aria-modal="true" id="modal{{ $user->id }}">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <button onclick="toggle({{$user->id}})" type="button" id="close-modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to delete this user :{{ $user->name }}</h3>
                    <button wire:click="deleteUser({{ $user->id }})" onclick="toggle({{$user->id}})" id="close-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button onclick="toggle({{$user->id}})" id="close-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal edite --}}
    @if($user->status === 1 || $user->status === 2 && Auth::user()->rule === 1)
    <div class="bg-black bg-opacity-50 inset-0 hidden z-50	top-0 right-0 left-0 overflow-y-auto fixed justify-center items-center" aria-modal="true" id="update{{ $user->id }}">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <button onclick="update({{$user->id}})" type="button" id="close-modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">{{ $user->name }}</h3>
                    @if($user->status != 2)
                    <button  wire:click="update({{ $user->id }},1)" onclick="update({{$user->id}})" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 shadow-lg shadow-red-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        <img src="{{ asset('assets/icon/2.svg') }}" width="20">
                    </button>                       
                    @endif
                    @if($user->status != 1)
                    <button wire:click="update({{ $user->id}},2)" onclick="update({{$user->id}})" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                        <img src="{{ asset('assets/icon/1.svg') }}" width="20">
                    </button>
                    @endif
                    @if($user->status != 3)
                    <button wire:click="update({{ $user->id}},3)" onclick="update({{$user->id}})" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        <img src="{{ asset('assets/icon/3.svg') }}" width="20">
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    </div>
</div>

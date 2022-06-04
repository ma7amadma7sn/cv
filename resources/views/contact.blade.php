<div wire:poll>
    @if($chating)
    <div class="mx-auto max-w-2xl rounded-lg bg-white">
        <div class="flex shadow-sm shadow-gray-900 h-13" style="z-index:9999 !important;">
            @if(Auth::user()->rule === 1)
            <img wire:click="closeChat" src="{{ asset('assets/icon/back.svg') }}" class=" cursor-pointer" width="35">
            <span class="mt-3 mr-2 ml-auto text-xl font-bold leading-none text-gray-900">{{ $username }}</span>
            <img src="assets/image/{{ $chatImage }}.png" width="30" class="mr-2 mt-1 mb-1">
            @endif
            @if(Auth::user()->rule === 2)
                <div class="mx-auto">
                    <img src="{{ asset('assets/image/admin.png') }}" width="50">
                </div>
            @endif

        </div>
        <div class="overflow-y-scroll overflow-x-hidden block" id="privescroll" style="height: 450px;">
            @if(Auth::user()->rule === 2)
                @foreach($chatuser as $messUser)
                @if($messUser->send == "admin" && $messUser->type_message === 1)
                    <div class="aw w-1/2 mr-auto mt-2 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">{{ $messUser->message }}</div>
                @endif
                @if($messUser->send != "admin" && $messUser->type_message === 1)
                    <div class="xom w-1/2 ml-auto mt-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $messUser->message }}</div>
                @endif 
                @if($messUser->send == "admin" && $messUser->type_message === 2)
                <img src="upload/{{ $messUser->message }}" class="mr-auto m-2" width="200">
                @endif
                @if($messUser->send != "admin" && $messUser->type_message === 2)
                <img src="upload/{{ $messUser->message }}" class="ml-auto m-2" width="200">
                @endif               
                @endforeach
                    @endif
             @if(Auth::user()->rule == 1)
                @foreach($chatAdmin as $messAdmin)
                @if($messAdmin->send == $person_id && $messAdmin->type_message === 1)
                    <div class="aw w-1/2 mr-auto mt-2 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">{{ $messAdmin->message }}</div>
                @endif
                @if($messAdmin->send != $person_id && $messAdmin->type_message === 1)
                    <div class="xom w-1/2 ml-auto mt-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">{{ $messAdmin->message }}</div>
                @endif
                @if($messAdmin->send == $person_id && $messAdmin->type_message === 2)
                <img src="upload/{{ $messAdmin->message }}" class="mr-auto m-2" width="200">
                @endif
                @if($messAdmin->send != $person_id && $messAdmin->type_message === 2)
                <img src="upload/{{ $messAdmin->message }}" class="ml-auto m-2" width="200">
                    @endif
                @endforeach  
                    @endif

        </div>
        <form wire:submit.prevent="sendChat" class="mt-3 flex">
            @csrf
            <button id="openModalMessage"  onclick="sendMessage()" type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-3 text-center mr-1 mb-1" for="sendimage">
                <img src="{{ asset('assets/icon/image.svg') }}"  width="25" alt="">
            </button>

            <input type="text" wire:model.defer="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block h-11 w-full p-2.5" placeholder="type...">
            <button onclick="setTimeout(scrollWin, 1500)" type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-3 text-center mr-1 mb-2 ">
                <img src="{{ asset('assets/icon/send.svg') }}" width="20">
            </button>
        </form>
    </div>
    <div  wire:ignore.self class="bg-black bg-opacity-50 inset-0 hidden z-50 top-0 right-0 left-0 overflow-y-auto fixed justify-center items-center" aria-modal="true" id="sendMessage">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <button onclick="sendMessage()" id="close-modal" type="button" id="close-modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
                <form  enctype="multipart/form-data" wire:submit.prevent="sendImage" class="p-6 text-center">
                    @csrf
            <label class="relative bg-white rounded-lg shadow" for="hehehe">
                <img src="{{ asset('assets/icon/image.svg') }}" class="mx-auto p-10 mt-11 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 w-1/2 rounded-lg shadow-lg" width="50">
            </label>
            <input type="file" wire:model.defer="image" id="hehehe" hidden>
            <button id="close-modal" onclick="setTimeout(sendMessage, 1500)" type="submit" class="text-white mt-40 bg-gradient-to-r w-full mt-3 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">upload</button>
        </form>
            </div>
        </div>
    </div>
        @else
    <div class="p-4 max-w-md mx-auto bg-white rounded-lg border shadow-md sm:p-8">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900">Users</h5>
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline">
                Welcome Admin
            </a>
       </div>
       <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($users as $user)
                <li wire:click='chatNow({{ $user->id }})' class="pt-3 pb-0 sm:pt-4 cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            @if($user->gender === 1)
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/image/man.png') }}" alt="Thomas image">
                            @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/image/wman.png') }}" alt="Thomas image">
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $user->name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                                {{ $user->email }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/image/'.$user->status.'.png') }}" alt="Thomas image">
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
       </div>
    </div>
    @endif
    <script>
function sendMessage(){
    const update = document.querySelector("#sendMessage");
    const close = document.querySelector("#close-modal");
    const openModal = document.querySelector("#openModalUpdate");
    update.classList.toggle('hidden');
    update.classList.toggle('flex');
}
        function scrollWin() {
            var privescroll = document.getElementById("privescroll");
            privescroll.scrollTo(0, 10000);
        }
    </script>
</div>

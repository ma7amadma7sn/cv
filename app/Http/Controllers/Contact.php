<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\messages as chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Contact extends Component{
    use WithFileUploads;
    public $chating = false,$person_id = null;
    public $username,$showChat,$message,$myId,$image,$chatImage;
    protected $rules = [
        'message' => 'required',
    ];
    public function sendImage(){
        $this->validate([
            'image' => 'image|mimes:jpg,png,jpeg,svg', 
        ]);
        $file = $this->image->getClientOriginalExtension();
        $this->myId = Auth::id();
        if(Auth::user()->rule === 2){
            $this->person_id = 'admin';
        }elseif(Auth::user()->rule === 1){
            $this->myId = "admin";
        }
        $fileName = rand().rand().rand().rand().".".$file;
        $this->image->storeAs('upload', $fileName,'public_path');
        chat::create([
            'message' => $fileName,
            'send' => $this->myId,
            'recive' => $this->person_id,
            'type_message' => 2,
            'is_seen' => 2,
        ]);
        $this->image = null;
    }
    public function chatNow($id){
        $this->chating = true;
        $this->person_id = $id;
        $user = User::find($id);
        $this->username = $user->name;
        $this->chatImage = $user->status;
    }

    public function closeChat(){
        $this->messages = null;
        $this->chating = false;
        $this->person_id = null;
    }
    public function sendChat(){
        // $this->validate();
      $this->chating = true;
        $this->myId = Auth::id();
        if(Auth::user()->rule === 2){
            $this->person_id = 'admin';
        }elseif(Auth::user()->rule === 1){
            $this->myId = "admin";
        }
         chat::create([
            'message' => $this->message,
            'send' => $this->myId,
            'recive' => $this->person_id,
            'type_message' => 1,
            'is_seen' => 2,
        ]);
    $this->message = null;
    }

    public function render(){
        if(Auth::user()->rule === 2){
            $this->chating = true;
        }
        // if(Auth::user()->rule === 1){
        //     $this->chating = false;
        // }
        $array = [
            'chatAdmin' => DB::table('messages')->where('send', "admin")->where('recive', $this->person_id)->orWhere('send', $this->person_id)->where('recive', "admin")->get(),
            'chatuser' => chat::where('send','admin')->where('recive', Auth::id())->orWhere('send',Auth::id())->where('recive','admin')->get(),
          'users' => User::where('rule',2)->get(),

        ];
        return view('contact', $array)->extends('layouts.app');
    }
}

<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Crudcard extends Component{
    public function accept($id){
        if(Auth::user()->rule === 1){
         User::whereId($id)->where('rule' , 2)->where('status', 3)->where('id' ,'<>', Auth::id())->update([
            'status' => 1,
        ]); }
    }
    public function update($id,$condition){
        if(Auth::user()->rule === 1){
        if($condition === 1){
        User::where('id',$id)->where('rule',2)->update(['status' => 2,]);
        }elseif($condition === 2){
            User::where('id',$id)->where('rule',2)->update(['status' => 1,]);
        }else{
            User::where('id',$id)->where('rule',2)->update(['status' => 3,]);
        } }
    }
    public function rejected($id){
        if(Auth::user()->rule === 1){
        User::whereId($id)->where('rule' , 2)->where('status', 3)->where('id' ,'<>', Auth::id())->update([
            'status' => 2,
        ]); }
    } 
    public function deleteUser($id){
        if(Auth::user()->rule === 1){
        User::whereId($id)->where('rule' , 2)->where('status', 3)->orWhere('status', 2)->where('id' ,'<>', Auth::id())->delete();
        }
    }
    public function render(){
        $array = [
            'users' => User::where('rule' , 2)->orderBy('created_at', 'DESC')->get(),
        ];
        return view('crudcard', $array);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Livewire\Component;

class Home extends Component{

    public function render(){

        return view('home')->extends('layouts.app');
    }
}

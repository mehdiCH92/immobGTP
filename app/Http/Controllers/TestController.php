<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mehdi;
class TestController extends Controller
{
    public function st(){
        $meh = new Mehdi();
        $meh->id = 1;
        $meh->name = 'mehdi';
        $meh->save();
    }
    public function test(){
        
        $user= Mehdi::all();
        var_dump($user);
    }
}

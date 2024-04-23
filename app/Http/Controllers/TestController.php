<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        $newuser= User::find(2);

        $newuser->name = "updated";
        
        $newuser->save();
    }

    public function home(){
        return view("home");
    }
}

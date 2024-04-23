<?php

namespace App\Http\Controllers;
use App\Models\Note;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){

        $newuser= Note::find(2);

        $newuser->name = "updated";
        
        $newuser->save();
    }

    public function home(){
        return view("home");
    }
}

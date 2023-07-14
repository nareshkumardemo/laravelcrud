<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;

class HomeController extends Controller
{
    public function show_home(){
        return redirect()->route('login');
    } 

}

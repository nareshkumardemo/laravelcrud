<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
class DashboardController extends Controller
{
    public function show_dashboard(Request $request){
        $users = DB::table('users')->count();
        $notes = DB::table('notes')->count();
        return view('dashboard', ['users' => $users, 'notes' => $notes]);
    }

    public function show_single_note($id){
        $notes = Note::find($id);
        return view('show_single',['note'=>$notes]);
    }
}

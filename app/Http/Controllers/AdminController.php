<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Note;

class AdminController extends Controller
{




    public function show(Request $request)
    {
      $id = Auth::user()->id;
       $search = $request->input('search');
 
        if(isset($search)){
            $users = User::where('name', 'LIKE', "%{$search}%")
                          -> orwhere('email', 'LIKE', "%{$search}%")
                          ->paginate(3);
            return view('admin.user_list',['users'=>$users]);
        }else{
            // $users = User::all()->where('id', '!=', $id);
            $users = User::where('id', '!=', $id)->latest()->paginate(3);
            return view('admin.user_list',['users'=>$users]); 

        }
        
    }

    public function index_user()
    {
       return view('admin.create_user');
     }

    public function create_user(Request $request)
    {
       $user = $request->User();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
       return redirect(route('users_show'))->with('status','Users Added Successfully');
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_user',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->save();
       return redirect(route('users_show'))->with('status','User Updated Successfully');
    }

    public function destroy($id)
    {
        $notes = Note::where('user_id',$id)->get()->count(); 
        @include('common.alert');
        if($notes > 0){
           return redirect()->route('users_show')->with('success', 'User Have Notes this User Note deleted!');
        }else{
            User::destroy($id);
        }
        return redirect()->route('users_show')->with('success', 'User deleted Successfuly!');   
    }
}
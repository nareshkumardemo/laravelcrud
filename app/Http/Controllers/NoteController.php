<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use App\Mail\MailShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Note;

class NoteController extends Controller
{

    public function shownotes(Request $request)
    {

       $search = $request->input('search');
       $userid = $request->user()->id;
        $filter = $request->input('filter');

       $to = $request->input('to'); 
       $from = $request->input('from');

        if(isset($search)){
            
            $notes = Note::where('title', 'LIKE', "%{$search}%")
                         ->where('user_id',$userid)
                         ->paginate(3); 
        
            return view('shownote',['notes'=>$notes]);
        }
        elseif (isset($to) && isset($from) ){
            $notes = Note::where('created_at','<=',$from)
            ->whereDate('created_at','>=',$to)
            ->where('user_id',$userid)
            ->paginate(3); 
            return view('shownote',['notes'=>$notes ,'to'=>$to, 'from'=>$from]);

        }
        else{
              if($this->isadmin()){
                   $notes = Note::latest()->paginate(3);  
                   return view('shownote',['notes'=>$notes]);
                   
                }else{
                    $notes = Note::where('user_id',$userid)->latest()->paginate(3); 
                    return view('shownote',['notes'=>$notes]);               
                }
        }
        
    }
    
    public function index()
    {
        return view('note');
    }

    
    public function create(Request $request)
    {
        $user = $request->user();
        $note = new Note;
        $note->title = $request->title;
        $note->notes = $request->notes;
        $user->note()->save($note);
        return redirect(route('shownotes'))->with('status','Notes Added Successfully');

    }

    public function edit($id)
    {
        $note = Note::find($id);
        return view('edit_note',['note'=>$note]);
    }

    public function update(Request $request, $id)
    {
       $note = Note::find($id);
       $note->title = $request->title;
       $note->notes = $request->notes;
       $note->save();
       return redirect(route('shownotes'))->with('status','Notes Updated Successfully');


    }

    public function destroy($id)
    {
        Note::destroy($id);
        return redirect(route('shownotes'))->with('status','Notes Deleted');     
    }

    public function shaire(Request $request){
       
        return view('search',['note_id'=>$request->id]);
    }


    public function search(Request $request){
         $data =  $request->all();

        // print_r ($data['note_id']);
        //     die();

        $search = $request->input('search');
        $reciver = User::query()
            ->where('email', 'LIKE', "%{$search}%")
            ->get();  
             
        return view('search',['reciver'=>$reciver,'note_id'=>$data['note_id']]);
    }


    public function sendMail(Request $request)
   {   
    $data =  $request->all();

    //   print_r($data['id']);
    //      die();
       $id = $data['id'];
       $email = $request->input('email');

        $notes = Note::find($id);
        $note = $notes->notes;
      
        Mail::to($email)->send(new MailShipped(['notes'=>$note]));
        
        return redirect(route('search',['note_id'=>$id]))->with('status','Notes Shaired Successfully');
        
   }

}

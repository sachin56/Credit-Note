<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function sendmail($id){

        $result = DB::table('users')
                    ->where('users.id',$id)
                    ->select('users.email')
                    ->get();

       
        $details=DB::table('credit_notes')
                    ->where('credit_notes.id',$id)
                    ->get();
       
        \Mail::to($result)->cc(['hiran@fedexlk.com'])->send(new \App\Mail\AssignUserMail($details));
    }

    public function approve_email($id){
       
        $details=DB::table('credit_note_descriptions')
                    ->Leftjoin('users as u1','u1.id','=','credit_note_descriptions.assign_user_id')
                    ->Leftjoin('users as u2','u2.id','=','credit_note_descriptions.futher_assign_user_id')
                    ->where('credit_note_descriptions.id',$id)
                    ->select('credit_note_descriptions.*','u1.name as username','u2.name as futhername')
                    ->get();
       
        \Mail::to(['hiran@fedexlk.com'])->send(new \App\Mail\ApproveMail($details));
    }
}

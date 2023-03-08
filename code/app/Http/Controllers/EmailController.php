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

        $test='lalindu.ja@fedexlk.com';

        $result = DB::table('users')
                    ->where('users.id',$id)
                    ->select('users.email')
                    ->get();

       
        $details=DB::table('credit_notes')
                    ->where('credit_notes.id',$id)
                    ->get();
       
        \Mail::to($result)->cc(['hiran@fedexlk.com'])->send(new \App\Mail\AssignUserMail($details));
    }
}

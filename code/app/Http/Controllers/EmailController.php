<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendmail($id){

        $test='lalindu.ja@fedexlk.com';

        $result = DB::table('users')
                    ->where('users.id',$id)
                    ->select('users.email')
                    ->get();

       
        $details=DB::table('credit_notes')
                    ->where('credit_notes.id',$id)
                    ->get();
       
        \Mail::to($result,)->send(new \App\Mail\AssignUserMail($details));
    }
}

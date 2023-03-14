<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreditNoteHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();

        return view('credit_note_history')->with(['users'=>$users]);
    }

    public function create(){
        $result= DB::table('credit_notes')
                ->Leftjoin('users as u1','u1.id','=','credit_notes.user',)
                ->Leftjoin('users as u2','u2.id','=','credit_notes.futher_explanantion_user')
                ->where('credit_notes.status',0)
                ->select('u1.name as name','credit_notes.*','u2.name as futhername')
                ->get();

        return DataTables($result)->make(true);
    }

    public function assign_description($id){
        
        $result = DB::table('credit_note_descriptions')
                    ->join('users','users.id','=','credit_note_descriptions.assign_user_id')
                    ->join('futher_explanations','futher_explanations.credit_note_id','=','credit_note_descriptions.credit_note_id')
                    ->where('credit_note_descriptions.credit_note_id',$id)
                    ->select('users.name','credit_note_descriptions.assign_user_description','credit_note_descriptions.assign_user_id','credit_note_descriptions.id','credit_note_descriptions.status','futher_explanations.*')
                    ->get();
                    
        return response()->json($result); 
    }
}

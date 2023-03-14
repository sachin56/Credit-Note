<?php

namespace App\Http\Controllers;
use App\Models\credit_note;
use App\Models\User;
use App\Models\credit_note_description;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FutherExplanationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();

        return view('futher_explanation')->with(['users'=>$users]);
    }

    public function create(){

        $result= DB::table('credit_notes')
                ->Leftjoin('users as u1','u1.id','=','credit_notes.user',)
                ->Leftjoin('users as u2','u2.id','=','credit_notes.futher_explanantion_user')
                ->where('credit_notes.futher_explanantion_user',Auth::user()->id)
                ->where('credit_notes.status',0)
                ->select('u1.name as username','credit_notes.*','u2.name as futhername')
                ->get();

        return DataTables($result)->make(true);
    }

    public function show($id){
        $result = DB::table('credit_note_descriptions')
                ->join('users','users.id','=','credit_note_descriptions.assign_user_id')
                ->where('credit_note_descriptions.id',$id)
                ->select('credit_note_descriptions.*','users.name as username')
                ->get();

        return response()->json($result);
    }
}

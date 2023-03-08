<?php

namespace App\Http\Controllers;

use App\Models\credit_note;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();

        return view('history')->with(['users'=>$users]);
    }

    public function create(){
        $result= DB::table('credit_notes')
                ->join('users','users.id','=','credit_notes.user')
                ->where('credit_notes.status',0)
                ->select('users.name','credit_notes.*')
                ->get();

        return DataTables($result)->make(true);
    }
    
    public function destroy($id){

        try{
            
            DB::beginTransaction();
            
                $value=credit_note::find($id);
                $value->status = '1';

                $value->save();

            DB::commit();
            return response()->json(['db_success' => 'Description Approved']);

        }catch(\Throwable $th){
            DB::rollback();
            throw $th;
            return response()->json(['db_error' =>'Database Error'.$th]);
        } 

    }
}

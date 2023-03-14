<?php

namespace App\Http\Controllers;

use App\Models\credit_note;
use App\Models\credit_note_description;
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
                ->Leftjoin('users as u1','u1.id','=','credit_notes.user',)
                ->Leftjoin('users as u2','u2.id','=','credit_notes.futher_explanantion_user')
                ->where('credit_notes.status',0)
                ->select('u1.name as name','credit_notes.*','u2.name as futhername')
                ->get();

        return DataTables($result)->make(true);
    }

    public function update(Request $request){
        // dump($request);
        $validator = Validator::make($request->all(), [
            'credit_date' => 'required',
            'credit_status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();
               
                $result = credit_note::find($request->id);
               
                $result->reference_number = $request->reference_no;
                $result->customer_name = $request->customer_name;
                $result->credit_note_amount = $request->credit_note_amount;
                $result->invoice_no = $request->invove_no;
                $result->awb = $request->awb;
                $result->calculation = $request->calculation;
                $result->crm_description = $request->crm_description;
                $result->crdit_note_close_date = $request->credit_date;
                $result->crdit_note_status = $request->credit_status;
                
                $result->save();
               
                DB::commit();
                return response()->json(['db_success' => 'Credit Note Updated']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

    public function show($id){
        // $result = credit_note_description::find($id);

        $result= DB::table('credit_note_descriptions')
                ->Leftjoin('users','users.id','=','credit_note_descriptions.assign_user_id','credit_note_descriptions.futher_assign_user_id')
                ->where('credit_note_descriptions.id',$id)
                ->select('users.name as username','credit_note_descriptions.*','users.name as futherusername')
                ->get();

        return response()->json($result);
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

    public function assign_user_change(Request $request){

        $validator = Validator::make($request->all(), [
            'assign_user_change' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $result = credit_note_description::find($request->id);
                $result->assign_user_id = $request->assign_user_change;
      
                $result->save();
             
                $value = credit_note::find($request->credit_not_id);
                $value->user=$request->assign_user_change;
                            
                $value->save();
               
                DB::commit();
                return response()->json(['db_success' => 'Credit Note Updated']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }
}

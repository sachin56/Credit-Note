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

<?php

namespace App\Http\Controllers;

use App\Models\credit_note;
use App\Models\credit_note_description;
use App\Models\User;
use App\Models\futher_explanation;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreditnoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();

        return view('credit_note')->with(['users'=>$users]);
    }

    public function create(){
        
        $result= DB::table('credit_notes')
                ->Leftjoin('users as u1','u1.id','=','credit_notes.user',)
                ->Leftjoin('users as u2','u2.id','=','credit_notes.futher_explanantion_user')
                ->where('credit_notes.user',Auth::user()->id)
                ->where('credit_notes.status',0)
                ->select('u1.name as name','credit_notes.*','u2.name as futhername')
                ->get();

        return DataTables($result)->make(true);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'add_description' => 'required',
            // 'add_assign_user' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $description = new credit_note_description;
                $description->credit_note_id = $request->add_credit_hid;
                $description->assign_user_description = $request->add_description;
                $description->assign_user_id = $request->add_assign_user;
                $description->futher_assign_hod_description = $request->futher_description;
                $description->futher_assign_user_id = $request->futher_assign_user;

                $description->save();

                $value=credit_note::find($request->add_credit_hid);  
                $value->futher_explanantion_user = $request->futher_assign_user;

                $value->save();

                $credit_note=credit_note::find($request->add_credit_hid);
                $credit_note->user=$request->add_assign_user;

                $credit_note->save();



                DB::commit();
                return response()->json(['db_success' => 'Added New Description']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

    public function update(Request $request){
    
        // dump($request);
        $validator = Validator::make($request->all(), [
            
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                dump( $request->des_lenghth);
                                   
                for($i = 0; $i < $request->des_lenghth; $i++){
                    
  
                    $type = 'des_hid_'.$i;
                    $des_description = 'description_'.$i;
                   
                    $value=credit_note_description::find($request->type);  
                    $value->assign_user_description = $request->des_description;

                    $value->save();

                }

                $credit_note=credit_note::find($request->id);
                
                $credit_note->assign_user=$request->assign_user;

                $credit_note->save();


                DB::commit();
                return response()->json(['db_success' => 'Added Description']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }

    }

    public function show($id){
        $result = credit_note::find($id);

        return response()->json($result);
    }

    public function assign_description($id){
        
        $result = DB::table('credit_note_descriptions')
                    ->Leftjoin('users','users.id','=','credit_note_descriptions.assign_user_id')
                    // ->where('credit_note_descriptions.futher_assign_user_id','=','users.id')
                    ->where('credit_note_descriptions.credit_note_id',$id)
                    ->select('users.name as username','users.name as name','credit_note_descriptions.assign_user_description','credit_note_descriptions.created_at','credit_note_descriptions.assign_user_id','credit_note_descriptions.id','credit_note_descriptions.status','credit_note_descriptions.updated_at','credit_note_descriptions.futher_assign_user_description','credit_note_descriptions.futher_assign_hod_description')
                    ->get();
                    
        return response()->json($result); 
    }

    
    public function assign_user($id){

        $result = User::all();

        return response()->json($result);
    }

    public function approve($id){
        try{
            
            DB::beginTransaction();
            
                $value=credit_note_description::find($id);
                $value->status = '0';

                $value->save();

            DB::commit();
            return response()->json(['db_success' => 'Description Approved']);

        }catch(\Throwable $th){
            DB::rollback();
            throw $th;
            return response()->json(['db_error' =>'Database Error'.$th]);
        } 

    }

    public function reject($id){
dump($id);
        try{
            
            DB::beginTransaction();
            
                $value=credit_note_description::find($id);
                $value->status = '1';

                $value->save();

            DB::commit();
            return response()->json(['db_success' => 'Description reject']);

        }catch(\Throwable $th){
            DB::rollback();
            throw $th;
            return response()->json(['db_error' =>'Database Error'.$th]);
        } 

    }

    public function futher_explanantion(Request $request){

        $validator = Validator::make($request->all(), [

        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $futher_explanation = new futher_explanation;
                $futher_explanation->credit_note_id = $request->credit_note_id;
                $futher_explanation->description_id = $request->descreption_id;
                $futher_explanation->futherex_assign_user_id = $request->further_assign_user;

                $futher_explanation->save();

                $credit_note=credit_note::find($request->credit_note_id);
                $credit_note->futher_explanantion_user=$request->further_assign_user;

                $credit_note->save();

                DB::commit();
                return response()->json(['db_success' => 'Added New branch']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

    public function user_futher_explanantion(Request $request){

        $validator = Validator::make($request->all(), [
            'futher_explanation_desc' => 'required',

        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $user_futher_explanation = credit_note_description::find($request->id);     
                $user_futher_explanation->futher_assign_user_description = $request->futher_explanation_desc;
                    
                $user_futher_explanation->save();

                DB::commit();
                return response()->json(['db_success' => 'Added New Explanation']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

}

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

class CreditnoteController extends Controller
{
    public function index(){
        $users = User::all();

        return view('credit_note')->with(['users'=>$users]);
    }

    public function create(){
        $result = credit_note::all();

        return DataTables($result)->make(true);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [

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

                $description->save();

                DB::commit();
                return response()->json(['db_success' => 'Added New branch']);

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
                   


                    // if($request->$des_hid_0 != null && $request->$des_description != null){

                    //     if($request->$des_id != 0 && $request->$des_description != 0){

                            $value=credit_note_description::find($request->type);
                            
                            $value->assign_user_description = $request->des_description;
                            //dump($value);
                            $value->save();
                    //     }
                    // }

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
                    ->join('users','users.id','=','credit_note_descriptions.assign_user_id')
                    ->where('credit_note_descriptions.credit_note_id',$id)
                    ->select('users.name','credit_note_descriptions.assign_user_description','credit_note_descriptions.assign_user_id','credit_note_descriptions.id','credit_note_descriptions.status')
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

        try{
            
            DB::beginTransaction();
            
                $value=credit_note_description::find($id);
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
                $futher_explanation->assign_user_id = $request->further_assign_user;

                $futher_explanation->save();

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

        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $user_futher_explanation = futher_explanation::where('description_id',$request->id)->first();     
                $user_futher_explanation->description = $request->futher_explanation_desc;
                    
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

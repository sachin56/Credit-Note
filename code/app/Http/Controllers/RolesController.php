<?php

namespace App\Http\Controllers;

use App\Models\u_roles;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index(){
        
        return view('u_role');
    }

    public function create(){
        $result = u_roles::all();

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

                $result = new u_roles;
                $result->description = $request->description;

                $result->save();

                DB::commit();
                return response()->json(['db_success' => 'Added New Role']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }

    public function show($id){
        $result = u_roles::find($id);

        return response()->json($result);

    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $type = u_roles::find($request->id);
                $type->description = $request->description;

                $type->save();

                DB::commit();
                return response()->json(['db_success' => 'Role Updated']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }

    }

    public function destroy($id){

        $result = u_roles::destroy($id);

        return response()->json($result);

    }

    public static function getroles(){
        $user_role=DB::table('u_user_roles')
        ->select('role_id')
        ->where('user_id','=',Auth::user()->id)
        ->get();

        return $user_role;
    }
}

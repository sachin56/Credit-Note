<?php

namespace App\Http\Controllers;

use App\Models\u_roles;
use App\Models\u_user_roles;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
        $role = u_roles::all();
        
        return view('user')->with(['roles' => $role]);
    }

    public function create(){
        $result = User::all();

        return DataTables($result)->make(true);
    }

    public function show($id){

        $result['users'] = User::find($id);

        $result['u_user_roles'] = u_user_roles::select('role_id')->where(['user_id' => $id])->get();    

        return response()->json($result);

    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                DB::beginTransaction();

                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;

                $user->save();

                $this->delete_roles( $user->id);

                $roles =$request->role_id;
                $users = $user->id;

                foreach( $roles as $role){

                    $user_role = new u_user_roles;
                    $user_role->user_id = $users;
                    $user_role->role_id = $role;

                    $user_role->save();

                }

                DB::commit();
                return response()->json(['db_success' => 'User Updated']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }

    }

    public function destroy($id){
        $result = User::destroy($id);
        $this->delete_roles($id);

        return response()->json($result);

    }

    public function delete_roles($id){
        u_user_roles::where(['user_id' => $id])->delete();
     }
}

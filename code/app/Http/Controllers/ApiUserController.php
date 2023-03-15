<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function store(Request $request){
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);

    }

    public function show($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id,Request $request){
        $user = User::find($id);
        $user->name=$request->name;
        $user->pid=$request->pid;
        $user->designation=$request->designation;
        if($request->email){
            $user->email=$request->email;
        }
        if($request->password){
        $user->password=Hash::make($request->password);
        }
        $user->save();
        return true;
    }

    public function destroy($id){
        $user = User::find($id);
        $ret=$user->delete();

        return response()->json($ret);

    }

    public function login($uid){
        if(Auth::loginUsingId($uid)){
        return redirect('/home');
        }else{
            return "error invalid user";
        }

    }

    public function DB_sync(Request $request){
        $users=$request->db;


        foreach($users as $user){
            $ret=User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);

            if($ret==null){
                return response('error', 500);
            }
        }
        return true;
    }
}


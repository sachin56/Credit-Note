<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class U_ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $user =  User::find(Auth::user()->id);

        return response()->json($user);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\credit_note;
use App\Models\User;

use Illuminate\Http\Request;

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
        $result = credit_note::where('futher_explanantion_user',Auth::user()->id)->get();

        return DataTables($result)->make(true);
    }
}

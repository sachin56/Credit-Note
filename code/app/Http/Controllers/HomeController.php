<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function monthly_creditnote_count(){
        $result= DB::table('credit_notes')
                ->select('credit_notes.id','credit_notes.created_at')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('m');        
                });
                $usermcount = [];
                $userArr = [];
            
                foreach ($result as $key => $value) {
                    $usermcount[(int)$key] = count($value);
                }
                $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                for($i = 1; $i <= 12; $i++){
                    if(!empty($usermcount[$i])){
                        $userArr[$i] = $usermcount[$i];    
                    }else{
                        $userArr[$i] = 0;    
                    }
                }    
                // return view('home')->with(['month'=>$month]);     
                return response()->json(array_values($month));
    }
}

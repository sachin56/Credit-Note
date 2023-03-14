<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Exports\CreditNoteExport;
use Illuminate\Support\Facades\DB;

class C_note_reportController extends Controller
{
    // public function index(){

    //     return view('report.credit_note_report');
    // }

    public function export(Request $request ,$id){
        $creditnote= DB::table('credit_notes')
                ->where('credit_notes.id',$id)
                ->select('credit_notes.*')
                ->get();

        $creditnotedescription = DB::table('credit_note_descriptions')
                //->join('users','users.id','credit_note_descriptions.assign_user_id')
                ->Rightjoin('users as u1','u1.id','=','credit_note_descriptions.assign_user_id',)
                ->Rightjoin('users as u2','u2.id','=','credit_note_descriptions.futher_assign_user_id')
                ->where('credit_note_descriptions.credit_note_id',$id)
                ->select('credit_note_descriptions.*','u1.name as username','u2.name as futhername')
                ->get();
        
        $data = array ('creditnote' => $creditnote,
                        'creditnotedescription'=>$creditnotedescription
                    );     
        
        $pdf = PDF::loadview('report/credit_note_report',$data)->setPaper('A4','portrait');  

        return $pdf->download('credit_note_'.date("Y-m-d H:i:s").'.pdf');   
        
        
        // return Excel::download(new CreditNoteExport($request->id),'-'.date('Y-m-d:H-i-s').'.xlsx');

    }
}

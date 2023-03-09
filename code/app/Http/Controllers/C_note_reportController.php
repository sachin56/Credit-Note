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
                ->join('users','users.id','credit_note_descriptions.assign_user_id')
                ->where('credit_note_descriptions.credit_note_id',$id)
                ->select('credit_note_descriptions.*','users.name as username')
                ->get();
        
        $data = array ('creditnote' => $creditnote,
                        'creditnotedescription'=>$creditnotedescription
                    );     
        
        $pdf = PDF::loadview('report/credit_note_report',$data)->setPaper('A4','portrait');  

        return $pdf->download('credit_note_'.date("Y-m-d H:i:s").'.pdf');   
        
        
        // return Excel::download(new CreditNoteExport($request->id),'-'.date('Y-m-d:H-i-s').'.xlsx');

    }
}

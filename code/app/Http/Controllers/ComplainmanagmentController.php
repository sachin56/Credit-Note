<?php

namespace App\Http\Controllers;

use App\Models\credit_note;
use App\Models\credit_note_description;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;


class ComplainmanagmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();
        return view('complain_managment')->with(['users'=>$users]);
    }

    public function esm_complain(){
         $curl = curl_init();

         curl_setopt_array($curl,array(
            CURLOPT_URL=>"https://esm.lk/esm/api/v1/CustomerComplaintManagement?maxSize=100&offset=0&orderBy=createdAt&order=desc",
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_ENCODING=>"",
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_TIMEOUT=>30,
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=> "GET",
            CURLOPT_POSTFIELDS=>"",
            CURLOPT_HTTPHEADER=>array(
                "X-Api-Key: 8cd938f50691380a4bda865d20087f5d",
                "Cache-Control:no-cache",
                "Content-type:application/json"
            ),
         ));

         $response=curl_exec($curl);
         $err=curl_error($curl);

         curl_close($curl);
         $boddy_array='';

         if($err){
            echo"cURL Error #:".$err;
         //}
         }else{
            $boddy_array=json_decode($response,true);
         }
        
        //  return response()->json($boddy_array['list']);
          return $boddy_array; 
        //   return DataTables($boddy_array)->make(true);
        
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'referenceNumber'=>'required',
            'c_name' => 'required',
            'invoice_no' => 'required',
            'awb' => 'required',
            'calculation' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                $ceditnote = new credit_note;

                $ceditnote->reference_number = $request->referenceNumber;
                $ceditnote->customer_name = $request->c_name;
                $ceditnote->credit_note_amount = $request->credit_amount;
                $ceditnote->invoice_no = $request->invoice_no;
                $ceditnote->awb = $request->awb;
                $ceditnote->calculation = $request->calculation;
                $ceditnote->crm_description = $request->crm_description;
                $ceditnote->crm_id = $request->crm_id;
                $ceditnote->description = $request->description;
                $ceditnote->assign_user = $request->assign_user;
                $ceditnote->status = 0;
                $ceditnote->user = $request->assign_user;
                $ceditnote->crdit_note_status = $request->credit_status;
                $ceditnote->crdit_note_close_date = $request->credit_date;
                
                $ceditnote->save();

                // $result = new credit_note_description;

                // $result->credit_note_id = $ceditnote->id;
                // $result->assign_user_id = $request->assign_user;

                // $result->save();

                DB::commit();
                return response()->json(['db_success' => 'Added New Credit Note']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }
}

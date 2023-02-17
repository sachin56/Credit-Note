<?php

namespace App\Http\Controllers;

use App\Models\credit_note_attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;


class CreditnoteAttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function create($id){
        $result = DB::table('credit_note_attachments')
                    ->where('credit_note_attachments.creditnote_id',$id)
                    ->get();

        return DataTables($result)->make(true);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'attachment_hid'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_error' => $validator->errors()->all()]);
        }else{
            try{
                if($request->file('attachement_path')) {
                    $file = $request->file('attachement_path');
                    $file_name =$request->attachment_hid.'-'.date('m-d-Y_H-i-s').'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('uploads\credit_note_attachment'), $file_name);

                    $attachment = new credit_note_attachment;
                    $attachment->creditnote_id = $request->attachment_hid;
                    $attachment->path = public_path("uploads\credit_note_attachment/".$file_name);

                    $attachment->save();
                }

                DB::commit();
                return response()->json(['db_success' => 'Added New Attachment']);

            }catch(\Throwable $th){
                DB::rollback();
                throw $th;
                return response()->json(['db_error' =>'Database Error'.$th]);
            }

        }
    }
}

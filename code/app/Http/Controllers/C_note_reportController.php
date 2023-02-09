<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_note_reportController extends Controller
{
    public function index(){

        return view('report.credit_note_report');
    }
}

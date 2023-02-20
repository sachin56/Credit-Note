<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th, td {
            border: 1px solid black;
        }
        th,td{
            font-size: 13px;
        }
        td,th{
            text-align: center;
            padding: 4px;
            font-size: 10px;
        }
        @page  {
        margin: 1cm 1.5cm 1cm 2.5cm;
        }
    </style>
</head>
<?php

foreach($creditnote as $value){

    $id= $value->id;
    $name= $value->customer_name;
    $credit_note_amount= $value->credit_note_amount;
    $invoice_no= $value->invoice_no;
    $awb= $value->awb;
    $calculation= $value->calculation;
    $crm_description= $value->crm_description;
    $description= $value->description;
}
?>

<body>
    <table cellspacing="0" cellpadding="0">
       
        <tr>
            <td style="width: 40px;text-align: left;padding:3px; border-bottom:none" colspan="3">Advantis Express (Pvt) Ltd</td>
            <th style="width: 65px; padding:3px;font-size:15px" colspan="6" rowspan="2">CREDIT NOTE CETIFICATE</th>
        </tr>
        <tr>
            <td style="width: 40px;text-align: left;padding:3px; border-top:none;border-bottom:none" colspan="3">200, Nawala Road, Narahenpita,</td>
        </tr>
        <tr>
            <td style="width: 40px;text-align: left;padding:3px; border-top:none;border-bottom:none" colspan="3">Colombo 05, Srilanka</td>
            <th style="width: 90px; padding:3px; font-size:14px" colspan="2" rowspan="2">REF NO</th>
            <th style="width: 90px; padding:3px; font-size:14px" colspan="4" rowspan="2">00{{$id}}</th>
        </tr>
        <tr>
            <td style="width: 40px;text-align: left;padding:3px;border-top:none;border-bottom:none" colspan="3">Tel: Tel: 2808835-44 Fax: 2808846-47 Email: maga@maga.lk</td>
        </tr>
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">Customer Name</th>
            <td style="width: 105px; padding:3px"colspan="3">{{$name}}</td>
            <th style="width: 65px;text-align: left; padding:3px" colspan="2">Credit Note Amount</th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="3">{{$credit_note_amount}}</td>
            
        </tr>
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">Invoice No </th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8">{{$invoice_no}}</td>
        </tr>
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">AWB No</small></th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8">&nbsp;{{$awb}}</td>
        </tr>
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">Calculation</th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8">{{$calculation}}</td>
        </tr>
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">Description</th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8">{{$crm_description}}</td>
        </tr>  
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">Hiran</th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8" >{{$description}}</td>
        </tr>   


        @foreach($creditnotedescription as $result)
        <tr>
            <th style="width: 40px;text-align: left;padding:3px;" colspan="2">{{$result->username}}</th>
            <td style="width: 65px;text-align: left; padding:3px" colspan="8">{{$result->assign_user_description}}</td>
        </tr>   
        @endforeach


        <tr>
            <td style="width: 30px; text-align: left;padding:3px">&nbsp;</td>
            <td style="width: 100px;text-align: left;padding:3px"></td>
            <td style="width: 40px;  padding:3px"></td>
            <td style="width: 80px; text-align: right; padding:3px;"></td>
            <td style="width: 40px;  padding:3px"></td>
            <td style="width: 80px; text-align: right; padding:3px;"></td>
            <td style="width: 40px;  padding:3px"></td>
            <td style="width: 55px;  padding:3px"></td>
            <td style="width: 80px; text-align: right; padding:3px"></td>
        </tr>

        <!-- <tr>
            <th style="width: 30px;text-align: left;padding:3px;" colspan="9">NOTE :*Attach Attendance sheets, Tax /Suspended Tax invoice, Invoice & other re]evant documetlts obtained from the Payee.+Bills to be prepared at the end of
each month. * attached a letter frorr the Sub Contractor indicating dctails ol Bank Account fbr the purpose ofremittance fronr Head Otilce.</th>
        </tr> -->
    </table>


</body>
</html>
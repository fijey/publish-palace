<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class XenditController extends Controller
{
    public function callbackInvoiceSuccess(Request $request){

        if($request->status == 'EXPIRED'){
            $transaction = Transaction::where('kode_pembayaran', $request->external_id)->first();
            $transaction->status = $request->status;
            $transaction->dibayar_pada = date('Y-m-d h:i:s');
            $transaction->update();
        }
        
        if($request->status == 'PAID'){
    
            $transaction = Transaction::where('kode_pembayaran', $request->external_id)->first();
            $transaction->status = $request->status;
            $transaction->dibayar_pada = date('Y-m-d h:i:s');
            $transaction->update();

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormValidation;

class MailController extends Controller
{
    public function sendMail(MailFormValidation $request){
        try{
            dispatch(new \App\Jobs\SendMail($request->all()));
        } catch (\Exception $e){
            return response()->json(['success'=>false,'error'=>$e->getMessage()]);
        }

        return response()->json(['success'=>true,'status'=>200]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //sessionDelete : delete session key
    public function sessionDelete(Request $request){
        if($request->post()){
       $request->session()->forget("status");
        return back();
       }
   }
}

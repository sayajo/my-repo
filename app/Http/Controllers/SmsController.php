<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Sms;

class SmsController extends Controller
{
    public function index(){
        $new=App\Sms::all();
        return view('sms',compact('new'));
    }

    public function store(Request $request){
        $sms=new Sms();
        $sms->number=$request['number'];
        $sms->message=$request['message'];
        $sms->save();
        return redirect('/sms');


    }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
class UserController extends Controller
{
    public function index(){
        $new=App\User::all();
        return view('user',compact('new'));
    }

    public function store(Request $request){
        $sms=new User();
         $sms->name=$request['name'];
        $sms->number=$request['number'];
        $sms->save();
        return redirect('/user');


    }
}

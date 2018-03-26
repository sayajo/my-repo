<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\SmsGateway;
use App;
use App\Sms;
use Carbon;

class MessageController extends Controller
{
   public function index(){
       $new=App\Sms::all();
       return view('sms',compact('new'));
   }

   protected function isNcell($number){

       if(preg_match("^[9][8][0123789]\d{7}$^", $number)) {

           return true;
       }
       return false;
   }

   public function message(Request $request) {
       $numbers = explode(',',$request['number']);          
       
       foreach ($numbers as $key => $n)  {
           if ($this->isNcell($n))
           {
               $number = $n;
               $message = $request->message;
               
               $smsGateway = new SmsGateway('tamangraaz78@gmail.com', 'innocentsteps78');
               
               $deviceID =83750;
               $message=$request->get('message');
               $info=$request->get('status');
               
               $result = $smsGateway->sendMessageToNumber($n, $message, $deviceID);


               $status = $result['response']['success'];
                $id =$result['response']['result']['success'][0]['id'];
               $results = $smsGateway->getMessage($id);
               if($results == true){
                $sms = Sms::get();
                Sms::create([
                    'number' => $number,
                    'message' => $message,
                    'status' => $info
                ]);
            }
            else
            {
                echo "Sms sending failed";
            }
        }
        else{
           $number = $n;
           $message = $request->message;

           $smsGateway = new SmsGateway('brejina462@gmail.com', 'arzu1234');

           $deviceID =83233;
           $message=$request->get('message');
           $info=$request->get('status');
           $result = $smsGateway->sendMessageToNumber($n, $message, $deviceID);
           $status = $result['response']['success'];
           $id =$result['response']['result']['success'][0]['id'];
           $results = $smsGateway->getMessage($id);
           if($results == true){
            $sms = Sms::get();
            Sms::create([
                'number' => $number,
                'message' => $message,
                'status' => $info
            ]);
        }else
        {
            echo "Sms sending failed";
        }
    }
}

}

}
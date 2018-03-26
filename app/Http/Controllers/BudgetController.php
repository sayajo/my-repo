<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

use App\Http\Requests;

class BudgetController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function store(Request $request)
    {   
        //get file
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');

        
        $header= fgetcsv($file);

          print_r($header); die;
        // dd($header);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }

        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }
            //trim data
            foreach ($columns as $key => &$value) {
                $value=preg_replace('/\D/','',$value);
            }

           $data= array_combine($escapedHeader, $columns);
            print_r($data); die;    

           // setting type
           foreach ($data as $key => &$value) {
            $value=($key=="ip" || $key=="number")?(integer)$value :(float)$value;
           }

           // Table update
           $ip=$data['ip'];
           $number=$data['number'];
           $message=$data['message'];

           $budget= Budget::firstOrNew(['ip'=>$ip,'number'=>$number]);
           $budget->message=$message;

           $budget->save();
        }
        
        
    }
}
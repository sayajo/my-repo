<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable=['number','message','status'
    ];    protected $table="sms";


}
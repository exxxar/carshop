<?php

namespace AutoKit;

use Illuminate\Database\Eloquent\Model;

class Vinrequest extends Model
{
    //
    protected $fillable = [
        'vincode',//+
        'year',//+
        'carmake',//+
        'power',//+
        'category',
        'month',//+
        'model',//+
        'volume',//+
        'additional_information',//+
        'cylinders',//+
        'body_type',//+
        'engine_type',//+
        'gearbox_type',//+
        'steering_wheel',//+
        'options',
        'equipment',//+
        'valves',//+
        'number_of_doors',//+
        'drive',//+
        'gearbox_number',//+
        'session',
        'user_id',
    ];

    public function getTyresRequestsCount(){
        return Tyres::where("vinrequest_id",$this->id)->count();
    }

    public function getDisksRequestsCount(){
        return Disks::where("vinrequest_id",$this->id)->count();
    }

}

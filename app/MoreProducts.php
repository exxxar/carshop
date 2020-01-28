<?php

namespace AutoKit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoreProducts extends Model
{



    protected $fillable = [
        'article', 'title', 'count','info','vinrequest_id'
    ];



    public function getVin(){
        return Vinrequest::where('id',$this->vinrequest_id)->first();
    }
}

<?php

namespace AutoKit;

use Illuminate\Database\Eloquent\Model;

class Tyres extends Model
{

    protected $fillable = [
        'tyre_width',
        'tyre_height',
        'diameter',
        'tyre_type',
        'seasonality',
        'manufacturer',
        'vinrequest_id',
    ];
}

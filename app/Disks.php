<?php

namespace AutoKit;

use Illuminate\Database\Eloquent\Model;

class Disks extends Model
{
    //

    protected $fillable = [
        'disc_width',
        'diameter',
        'radius',
        'holes',
        'pcd',
        'dco',
        'type',
        'color',
        'manufacturer',
        'vinrequest_id',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $fillable = ['ip_address', 'label'];
}

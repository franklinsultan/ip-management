<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $fillable = ['ip_address', 'label'];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('F d, Y h:i A');
    }
}

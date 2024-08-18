<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    protected $table = 'tbl_currencies';
    protected $fillable = [
        'name',
        'symbol',
        'short_code',
        'value',
        'provider',
    ];

}

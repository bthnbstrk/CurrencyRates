<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Currency extends Authenticatable
{
    protected $table = 'tbl_currencies';
    protected $guarded = [];

}

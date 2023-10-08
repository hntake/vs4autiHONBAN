<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feel extends Model
{
    use HasFactory;
    protected $fillable = [

        'message','message2','feel'
        ];
}

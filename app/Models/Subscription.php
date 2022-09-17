<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [

        'id','user_id','name','strip_id','strip_status','strip_price','quantity','trial_ends_at','ends_at'

        ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = [

        'email','address','name','type','name_pronunciation','tel1','artist_name','design','paid','unpaid','account_number','bank_name','bank_branch','bank_type',
        'image','account_name',
        ];
}

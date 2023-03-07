<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Independence extends Model
{
    use HasFactory;

    protected $fillable = [

        'id', 'user_id','schedule_name','image5','image1','image2','image3','image4','explain1','explain2','explain3','explain4','explain5','caution1','caution2','caution3','caution4','caution5','public'

         ];

}

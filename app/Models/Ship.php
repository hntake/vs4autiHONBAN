<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [

        'design_id','order' ,'postal','address','phone','ship','arrive','order_email','paid','mname','due_date'
    ];

    public function Design() {
        return $this->belongsTo(Design::class, 'design_id', 'id');
    }
}

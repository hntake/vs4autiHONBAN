<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $fillable = [

        'artist_id','design_id','user_id','payment_status','price','designName','email','download_status','name'
        ];
        public function Design() {
            return $this->belongsTo(Design::class, 'design_id', 'id');
        }
}

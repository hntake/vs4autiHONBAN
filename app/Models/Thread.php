<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    protected $fillable = [

        'category','title','count','alert'
        ];
        public function Category() {
            return $this->hasOne(Category::class, 'id','category');
        }
}

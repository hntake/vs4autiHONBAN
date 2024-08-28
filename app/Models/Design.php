<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stichoza\GoogleTranslate\GoogleTranslate;


class Design extends Model
{
    use HasFactory;
    protected $fillable = [

        'email','image','name'.'price','downloaded','genre1','genre2' ,'genre3','name_en','artist_name','artist_id','real_image',
        'image_with_artist_name','license','protect','real_image_with_name','original','image1','image2','image3','width','height','depth','weight'    
    ];
    public function Genre1() {
        return $this->hasOne(Genre::class, 'id','genre1');
    }
    public function Genre2() {
        return $this->hasOne(Genre::class, 'id','genre2');
    }
    public function Genre3() {
        return $this->hasOne(Genre::class, 'id','genre3');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($work) {
            $translator = new GoogleTranslate('en');
            $translator->setSource('ja');
            $work->name_en = $translator->translate($work->name);
        });
    }
}
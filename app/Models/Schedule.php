<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Illust;
use Kyslik\ColumnSortable\Sortable;

class Schedule extends Model
{
    use HasFactory;


    protected $table = 'schedules';

    protected $fillable = [

       'id', 'schedule_name','image0','image1','image2','image3','image4','user_id','list'

        ];

        public $sortable =

        [
            'schedule_name',
        ];
    public function imageOne()
        {
            return $this->hasOne(Image::class,'id','image0');

        }
    public function imageTwo()
        {
            return $this->hasOne(Image::class,'id','image1');

        }
    public function imageThree()
        {
            return $this->hasOne(Image::class,'id','image2');

        }
    public function imageFour()
        {
            return $this->hasOne(Image::class,'id','image3');

        }
    public function imageFive()
        {
            return $this->hasOne(Image::class,'id','image4');

        }
    public function illustOne()
        {
            return $this->hasOne(Illust::class,'id','image0');

        }
    public function illustTwo()
        {
            return $this->hasOne(Illust::class,'id','image1');

        }
    public function illustThree()
        {
            return $this->hasOne(Illust::class,'id','image2');

        }
    public function illustFour()
        {
            return $this->hasOne(Illust::class,'id','image3');

        }
    public function illustFive()
    {
        return $this->hasOne(Illust::class,'id','image4');

    }
}

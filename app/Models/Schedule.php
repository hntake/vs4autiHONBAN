<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Kyslik\ColumnSortable\Sortable;

class Schedule extends Model
{
    use HasFactory;


    protected $table = 'schedules';

    protected $fillable = [

       'id', 'schedule_name','image0','image1','image2','image3','image4','name','list'

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
   /*  public function order($select)
        {
            if($select == 'asc'){
                return $this->orderBy('created_at', 'asc')->get();
            } elseif($select == 'desc') {
                return $this->orderBy('created_at', 'desc')->get();
            } else {
                return $this->all();
            }
        } */

}

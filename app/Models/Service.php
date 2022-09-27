<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table='services';
    protected $guarded=[];
    public $timestamps=true;
    public $translatable=['title','description'];


    public function parent(){
     return $this->belongsTo(self::class,'parent_id');
    }
    public function child(){
        return  $this->hasMany(self::class , 'parent_id');
    }
    public function status(){
        return   $this->status == 1 ?  trans('dashboard.active') : trans('dashboard.neg');
    }


}

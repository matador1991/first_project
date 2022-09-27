<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $table='settings';
    protected $guarded=[];
    public $timestamps=true;
    public $translatable=['title','author','keywords','description','address'];
}

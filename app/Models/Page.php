<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $table='pages';
    protected $guarded=[];
    public $timestamps=true;

    public $translatable=['name','description'];
}

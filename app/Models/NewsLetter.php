<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsLetter extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table='news_letters';
    protected $guarded=[];
    public $timestamps=true;

    public $translatable=['name'];
}

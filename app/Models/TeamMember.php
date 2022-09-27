<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table='team_members';
    protected $guarded=[];
    public $timestamps=true;
    public $translatable=['name','description','position'];
}


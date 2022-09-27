<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->delete();
        Setting::create([
            'author'=>'fadi',
            'keywords'=>'fadi',
            'title'=>'fadi',
            'address'=>'fadi',
            'description'=>'fadi',
            'email'=>'ffaffaf',
            'first_phone'=>'0124565566',
            'second_phone'=>'0124565566',
            'whatsApp'=>'0124565566',
            'facebook'=>'facebook',
            'twitter'=>'twitter',
            'instagram'=>'instagram',
            'telegram'=>'telegram',
            'logo'=>'1.jpg'
        ]);



    }
}

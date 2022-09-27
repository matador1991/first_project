<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index(){

        $settings= Setting::all();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(SettingRequest $request){
        try{
            $setting=Setting::find($request->id);
            $setting->update([
                'author'=>['ar'=>$request->author_ar ,'en'=>$request->author_en],
                'description'=>['ar'=>$request->description_ar ,'en'=>$request->description_en],
                'title'=>['ar'=>$request->title_ar ,'en'=>$request->title_en],
                'keywords'=>['ar'=>$request->keywords_ar ,'en'=>$request->keywords_en],
                'address'=>['ar'=>$request->address_ar ,'en'=>$request->address_en],
                'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,
                'telegram'=>$request->telegram,
                'whatsApp'=>$request->whatsApp,
                'twitter'=>$request->twitter,
                'first_phone'=>$request->first_phone,
                'second_phone'=>$request->second_phone,
                'email'=>$request->email,
            ]);
            if($request->has('logo')) {
                 if(File::exists(public_path($setting->logo))){
                unlink(public_path($setting->logo)) ;
                }
                $logo_name = $request->logo;
                $image=uploadImage('logo',$logo_name);
                $setting->update(['logo' => $image]);
            }

            return redirect()->route('setting.index')->with([
                'alert-type'=> 'success',
                'message' =>trans('dashboard.success')
            ]);

        }
        catch (\Exception $e){
            return redirect()->route('setting.index')->with([
                'alert-type'=> 'danger',
                'message' =>trans('dashboard.error',$e->getMessage())
            ]);
        }

    }
}

<?php

use App\Models\Setting;

define('PAGINATION_COUNT',10);

 function slug($string, $separator = '-') {
    if (is_null($string)) {
        return "";
    }

    $string = trim($string);

    $string = mb_strtolower($string, "UTF-8");;

    $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

    $string = preg_replace("/[\s-]+/", " ", $string);

    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

function uploadImage($folder,$image){
    $filename=$image->hashName();
    $name='admin/upload_attachment/image/'.$folder.'/'.$filename;
    $path='admin/upload_attachment/image/'.$folder;
    $image->move($path,$filename);
    return $name;
}

// function uploadFile($request,$name,$folder)
//{
//    $file_name = $request->file($name)->getClientOriginalName();
//
//    $request->file($name)->storeAs('image/',$folder.'/'.$file_name,'upload_attachments');
//
//}
//
// function deleteFile($name,$folder)
//{
//    $exists = Storage::disk('upload_attachments')->exists('attachments/'.$folder.'/'.$name);
//
//    if($exists)
//    {
//        Storage::disk('upload_attachments')->delete('attachments/'.$folder.'/'.$name);
//    }
//}



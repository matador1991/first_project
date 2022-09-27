<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $services=Service::with('parent')->get();
   return view('admin.services.index',compact('services'));
  }

  public function create(){
      $services=Service::whereNull('parent_id')->get();
      return view('admin.services.create',compact('services'));
  }

  public function store(Request $request){
      try{

          if($request->has('status')){
              $status = $request->status;
          }
          else{
              $status = 0;
          }

          Service::create([
              'title'=>['ar'=>$request->title_ar, 'en'=>$request->title_en],
              'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
              'parent_id'=>$request->parent_id,
              'status'=>$status,
          ]);

          if($request->has('image')) {
              $photo = $request->image;
              $image=uploadImage('services',$photo);
              Service::latest()->first()->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('service.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch(\Exception $ex){
          return redirect()->route('service.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
  }

    public function edit($id){
        $service=Service::find($id);
        $services=Service::get();
        return view('admin.services.edit',compact('service','services'));
    }

    public function update(Request $request){
      try{
          $service=Service::find($request->id);
          if($request->has('status')){
              $status = $request->status;
          }
          else{
              $status = 0;
          }
          if(!$service){
              return redirect()->route('service.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
           $service->update([
               'title'=>['ar'=>$request->title_ar, 'en'=>$request->title_en],
               'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
               'parent_id'=>$request->parent_id,
               'status'=>$status
           ]);
          if($request->has('image')) {
              if(File::exists(public_path($service->image))){
                  unlink(public_path($service->image)) ;
              }
              $photo = $request->image;
              $image=uploadImage('services',$photo);
              $service->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('service.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
           }catch(\Exception $ex){
          return redirect()->route('service.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
    }
    public function delete($id){
      try{
          $service=Service::with('child')->find($id);
          if(!$service){
              return redirect()->route('service.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          if($service->child->count() != 0) {
              return redirect()->route('service.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('service.hasCheldren')
              ]);
          }

          if(File::exists(public_path($service->image)) && $service->image != null){
              unlink(public_path($service->image)) ;
          }
          $service->delete();
          return redirect()->route('service.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch (\Exception $ex){
          return redirect()->route('service.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
    }


}

?>

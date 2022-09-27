<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $admins=Admin::get();
   return view('admin.admins.index',compact('admins'));
  }

  public function reset(Request $request){

      try{
           $rules=['password' => 'required|confirmed|min:8'];
           $validator=$validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
      $admin=Admin::find($request->id);

      if(empty($admin)){
         return redirect()->route('admin.index')->with([
             'alert-type'=> 'danger',
            'message' =>trans('dashboard.error')
            ]);
      }
      $admin->update([
          'password'=>bcrypt($request->password)
      ]);
      Auth()->logout();
      return redirect()->route('adminGetLogin')->with([
             'alert-type'=> 'success',
            'message' =>trans('dashboard.success')
            ]);
      }catch (\Exception $ex){

          return redirect()->route('admin.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
  }

}

?>

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $members=TeamMember::get();
      return view('admin.projects.index',compact('members'));
  }

  public function create(){
      return view('admin.team_members.create');
  }

  public function store(Request $request){
      try{

          TeamMember::create([
              'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
              'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
               'position'=>$request->position
              ]);

          if($request->has('image')) {
              $photo = $request->image;
              $image=uploadImage('team_members',$photo);
              TeamMember::latest()->first()->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('member.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch(\Exception $ex){
          return redirect()->route('member.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
  }

    public function edit($id){
        $members=TeamMember::find($id);
        return view('admin.team_members.edit',compact('members'));
    }

    public function update(Request $request){
      try{
          $members=TeamMember::find($request->id);

          if(!$members){
              return redirect()->route('member.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          $members->update([
               'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
               'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
               'position'=>$request->position
           ]);
          if($request->has('image')) {
              if(File::exists(public_path($members->image))){
                  unlink(public_path($members->image)) ;
              }
              $photo = $request->image;
              $image=uploadImage('team_members',$photo);
              $members->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('member.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
           }catch(\Exception $ex){
          return redirect()->route('member.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
    }
    public function delete($id){
      try{
          $members=TeamMember::find($id);
          if(!$members){
              return redirect()->route('member.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          if(File::exists(public_path($members->image)) && $members->image != null){
              unlink(public_path($members->image)) ;
          }
          $members->delete();
          return redirect()->route('member.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch (\Exception $ex){
          return redirect()->route('member.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
    }


}

?>

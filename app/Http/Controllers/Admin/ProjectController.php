<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $projects=Project::get();
      return view('admin.projects.index',compact('projects'));
  }

  public function create(){
      return view('admin.projects.create');
  }

  public function store(Request $request){
      try{

          Project::create([
              'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
              'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
          ]);

          if($request->has('image')) {
              $photo = $request->image;
              $image=uploadImage('projects',$photo);
              Project::latest()->first()->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('project.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch(\Exception $ex){
          return $ex;
          return redirect()->route('project.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
  }

    public function edit($id){
        $project=Project::find($id);
        return view('admin.projects.edit',compact('project'));
    }

    public function update(Request $request){
      try{
          $project=Project::find($request->id);

          if(!$project){
              return redirect()->route('project.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          $project->update([
               'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
               'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
           ]);
          if($request->has('image')) {
              if(File::exists(public_path($project->image))){
                  unlink(public_path($project->image)) ;
              }
              $photo = $request->image;
              $image=uploadImage('projects',$photo);
              $project->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('project.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
           }catch(\Exception $ex){
          return redirect()->route('projects.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
    }
    public function delete($id){
      try{
          $project=project::find($id);
          if(!$project){
              return redirect()->route('project.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          if(File::exists(public_path($project->image)) && $project->image != null){
              unlink(public_path($project->image)) ;
          }
          $project->delete();
          return redirect()->route('project.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch (\Exception $ex){
          return redirect()->route('project.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
    }


}

?>

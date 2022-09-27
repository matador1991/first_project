<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $clients=Client::get();
      return view('admin.clients.index',compact('clients'));
  }

  public function create(){
      return view('admin.clients.create');
  }

  public function store(ClientRequest $request){
      try{

          Client::create([
              'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
              'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
              'link'=>$request->link,
          ]);

          if($request->has('image')) {
              $photo = $request->image;
              $image=uploadImage('clients',$photo);
              Client::latest()->first()->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('client.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch(\Exception $ex){
          return redirect()->route('client.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
  }

    public function edit($id){
        $client=Client::find($id);
        return view('admin.clients.edit',compact('client'));
    }

    public function update(ClientRequest $request){
      try{
          $client=client::find($request->id);

          if(!$client){
              return redirect()->route('client.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          $client->update([
               'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
               'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
               'link'=>$request->link,
           ]);
          if($request->has('image')) {
              if(File::exists(public_path($client->image))){
                  unlink(public_path($client->image)) ;
              }
              $photo = $request->image;
              $image=uploadImage('clients',$photo);
              $client->update(
                  ['image'=>$image]
              );
          }
          return redirect()->route('client.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
           }catch(\Exception $ex){
          return redirect()->route('client.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error')
          ]);
      }
    }
    public function delete($id){
      try{
          $client=Client::find($id);
          if(!$client){
              return redirect()->route('client.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }
          if(File::exists(public_path($client->image)) && $client->image != null){
              unlink(public_path($client->image)) ;
          }
          $client->delete();
          return redirect()->route('client.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch (\Exception $ex){
          return redirect()->route('client.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
    }


}

?>

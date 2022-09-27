<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\models\Setting;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index(){
        $pages=Page::get();
        return view('admin.pages.index',compact('pages'));
    }
    public function create(){
        return view('admin.pages.create');
    }

    public function store(PageRequest $request){
        try{

            Page::create([
                'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
                'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
            ]);

            if($request->has('image')) {
                $photo = $request->image;
                $image=uploadImage('pages',$photo);
                Page::latest()->first()->update(
                    ['image'=>$image]
                );
            }
            return redirect()->route('page.index')->with([
                'alert-type'=> 'success',
                'message' =>trans('dashboard.success')
            ]);
        }catch(\Exception $ex){
            return redirect()->route('page.index')->with([
                'alert-type'=> 'danger',
                'message' =>trans('dashboard.error')
            ]);
        }
    }

    public function edit($id){
        $page=Page::find($id);
        return view('admin.pages.edit',compact('page'));
    }

    public function update(PageRequest $request){
        try{
            $page=Page::find($request->id);

            if(!$page){
                return redirect()->route('page.index')->with([
                    'alert-type'=> 'danger',
                    'message' =>trans('dashboard.notExsist')
                ]);
            }
            $page->update([
                'name'=>['ar'=>$request->name_ar, 'en'=>$request->name_en],
                'description'=>['ar'=>$request->description_ar, 'en'=>$request->description_en],
            ]);
            if($request->has('image')) {
                if(File::exists(public_path($page->image))){
                    unlink(public_path($page->image)) ;
                }
                $photo = $request->image;
                $image=uploadImage('pages',$photo);
                $page->update(
                    ['image'=>$image]
                );
            }
            return redirect()->route('page.index')->with([
                'alert-type'=> 'success',
                'message' =>trans('dashboard.success')
            ]);
        }catch(\Exception $ex){
            return redirect()->route('page.index')->with([
                'alert-type'=> 'danger',
                'message' =>trans('dashboard.error')
            ]);
        }
    }

    public function delete($id){
        try{
            $page=Page::find($id);
            if(!$page){
                return redirect()->route('page.index')->with([
                    'alert-type'=> 'danger',
                    'message' =>trans('dashboard.notExsist')
                ]);
            }
            if(File::exists(public_path($page->image)) && $page->image != null){
                unlink(public_path($page->image)) ;
            }
            $page->delete();
            return redirect()->route('page.index')->with([
                'alert-type'=> 'success',
                'message' =>trans('dashboard.success')
            ]);
        }catch (\Exception $ex){
            return redirect()->route('page.index')->with([
                'alert-type'=> 'danger',
                'message' =>trans('dashboard.error'.$ex->getMessage())
            ]);
        }
    }
}

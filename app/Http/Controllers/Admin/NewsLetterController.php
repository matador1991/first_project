<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $news=NewsLetter::get();
      return view('admin.news_letters.index',compact('news'));
  }


    public function delete($id){
      try{
          $news=NewsLetter::find($id);
          if(!$news){
              return redirect()->route('news_letter.index')->with([
                  'alert-type'=> 'danger',
                  'message' =>trans('dashboard.notExsist')
              ]);
          }

          $news->delete();
          return redirect()->route('news_letter.index')->with([
              'alert-type'=> 'success',
              'message' =>trans('dashboard.success')
          ]);
      }catch (\Exception $ex){
          return redirect()->route('news_letter.index')->with([
              'alert-type'=> 'danger',
              'message' =>trans('dashboard.error'.$ex->getMessage())
          ]);
      }
    }


}

?>

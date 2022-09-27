@extends('layouts.adminLayout')
@section('css')

@section('title')
    {{trans('page.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title mt-2 pt-5">
        <div class="row ">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('page.edit')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('page.edit')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="card-content collapse show">
            <div class="card-body">
                <form class="form"
                      action="{{route('page.update')}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="text" hidden value="{{$page->id}}">
                    <h4 class="form-section"><i class="ft-home"></i> {{trans('page.data')}} </h4>
                    <div class="row justify-content-center">
                        <img style="width: 150px; height: 150px" src="{{asset($page->image)}}">
                    </div>
                    <div class=" row pt-2 pb-2">
                        <div class="col-md-12">
                            <div class="form-group pt-1 ">
                                <label for="switcheryColor4">{{trans('dashboard.image')}}</label>
                                <input name="image" accept="image/*" type="file"  class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">
                                    {{trans('page.name_ar')}}
                                </label>
                                <input type="text" id="name"
                                       class="form-control"
                                       placeholder="  "
                                       value="{{$page->getTranslation('name' , 'ar')}}"
                                       name="name_ar">
                                @if($errors->has('name_ar'))
                                    <div class="error">{{ $errors->first('name_ar') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">
                                    {{trans('page.name_en')}}
                                </label>
                                <input type="text" id="name"
                                       class="form-control"
                                       placeholder="  "
                                       value="{{$page->getTranslation('name' , 'en')}}"
                                       name="name_en">
                                @if($errors->has('name_en'))
                                    <div class="error">{{ $errors->first('name_en') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 ">
                                <label for="switcheryColor4">{{trans('page.description_ar')}} </label>
                                <textarea id="summernote1" name="description_ar" class="form-control">{{$page->getTranslation('description' , 'ar')}}</textarea>
                                @if($errors->has('description_ar'))
                                    <div class="error">{{ $errors->first('description_ar') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 ">
                                <label for="switcheryColor4">{{trans('page.description_en')}} </label>
                                <textarea id="summernote2" name="description_en" class="form-control">{{$page->getTranslation('description' , 'en')}}</textarea>
                                @if($errors->has('description_en'))
                                    <div class="error">{{ $errors->first('description_en') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-actions pt-2">
                        <button type="button" class="btn btn-outline-dark"
                                onclick="history.back();">
                            <i class="ft-x"></i> {{trans('dashboard.back')}}
                        </button>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="la la-check-square-o"></i>{{trans('dashboard.update')}}
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
            $('#summernote2').summernote();
        });
    </script>
@endsection

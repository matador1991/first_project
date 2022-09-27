@extends('layouts.adminLayout')
@section('css')

@section('title')
    {{trans('service.edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title mt-2 pt-5">
        <div class="row ">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('service.edit')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('service.edit')}}</li>
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
                      action="{{route('service.update')}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id" value="{{$service->id}}">
                    <h4 class="form-section"><i class="ft-home"></i> {{trans('service.data')}} </h4>
                    <div class="row justify-content-center">
                        <img style="width: 150px; height: 150px" src="{{asset($service->image)}}">
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
                                    {{trans('service.name_ar')}}
                                </label>
                                <input type="text" id="name"
                                       class="form-control"
                                       placeholder="  "
                                       value="{{$service->getTranslation('title' , 'ar')}}"
                                       name="title_ar">
                                @if($errors->has('title_ar'))
                                    <div class="error">{{ $errors->first('title_ar') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">
                                    {{trans('service.name_en')}}
                                </label>
                                <input type="text" id="name"
                                       class="form-control"
                                       placeholder="  "
                                       value="{{$service->getTranslation('title' , 'en')}}"
                                       name="title_en">
                                @if($errors->has('title_en'))
                                    <div class="error">{{ $errors->first('title_en') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 ">
                                <label for="switcheryColor4">{{trans('service.description_ar')}} </label>
                                <textarea id="summernote1" name="description_ar" class="form-control">{{$service->getTranslation('description' , 'ar')}}</textarea>
                                @if($errors->has('description_ar'))
                                    <div class="error">{{ $errors->first('description_ar') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 ">
                                <label for="switcheryColor4">{{trans('service.description_en')}} </label>
                                <textarea id="summernote2" name="description_en" class="form-control">{{$service->getTranslation('description' , 'en')}}</textarea>
                                @if($errors->has('description_en'))
                                    <div class="error">{{ $errors->first('description_en') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="switcheryColor4" class="col-lg-2 p-2 col-form-label font-weight-semibold">
                            {{ trans('sidebar.service') }}
                        </label>

                        <select class="form-control col-lg-5" name="parent_id">
                            <option value="">{{ trans('service.choose') }}</option>
                            @foreach ($services as $serv)
                                @if($serv->id != $service->id)
                                <option value="{{ $serv->id }}" @if($serv->id == $service->parent_id) selected @endif>
                                    {{ $serv->title }}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="switcheryColor4" class="col-lg-3 col-form-label font-weight-semibold">
                            {{trans('service.activate')}}
                        </label>
                        <div class="col-lg-1 pt-1">
                            <input type="checkbox" value="1"
                                   name="status"
                                   id="switcheryColor4"
                                   class="switchery" data-color="success"
                                   @if($service->status == 1)checked @endif/>
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

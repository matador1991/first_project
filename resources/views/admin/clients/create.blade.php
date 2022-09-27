@extends('layouts.adminLayout')
@section('css')

@section('title')
    {{trans('client.create')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title mt-2 pt-5">
        <div class="row ">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('client.create')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('client.create')}}</li>
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
                  action="{{route('client.store')}}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                    <h4 class="form-section"><i class="ft-home"></i> {{trans('client.data')}} </h4>
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
                                        {{trans('client.name_ar')}}
                                    </label>
                                    <input type="text" id="name"
                                           class="form-control"
                                           placeholder="  "
                                           value="{{old('name')}}"
                                           name="name_ar">
                                    @if($errors->has('name_ar'))
                                        <div class="error">{{ $errors->first('name_ar') }}</div>
                                    @endif
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">
                                    {{trans('client.name_en')}}
                                </label>
                                <input type="text" id="name"
                                       class="form-control"
                                       placeholder="  "
                                       value="{{old('name')}}"
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
                            <label for="switcheryColor4">{{trans('client.description_ar')}} </label>
                        <textarea id="summernote1" name="description_ar" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group pt-1 ">
                            <label for="switcheryColor4">{{trans('client.description_en')}} </label>
                            <textarea id="summernote2" name="description_en" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">
                                {{trans('client.link')}}
                            </label>
                            <input type="text" id="name"
                                   class="form-control"
                                   placeholder="  "
                                   value="{{old('name')}}"
                                   name="link">
                            @if($errors->has('link'))
                                <div class="error">{{ $errors->first('link') }}</div>
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
                        <i class="la la-check-square-o"></i>{{trans('dashboard.add')}}
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

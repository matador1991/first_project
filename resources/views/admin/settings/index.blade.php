@extends('layouts.adminLayout')
@section('css')

@section('title')
   Settings
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title  pt-5">
        <div class="row ">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sidebar.setting')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sidebar.setting')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{route('setting.update')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 border-right-2 border-right-blue-400">
{{--                                <div class="form-group row">--}}
{{--                                    <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">العام الحالي<span class="text-danger">*</span></label>--}}
{{--                                    <div class="col-lg-9">--}}
{{--                                        <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">--}}
{{--                                            <option value=""></option>--}}
{{--                                            @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)--}}
{{--                                                <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>--}}
{{--                                            @endfor--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                @if(isset($settings) && $settings->count() > 0)
                                    @foreach($settings as $setting)
                                 <input name="id" hidden value="{{$setting->id}}">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.keywords_ar')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input required name="keywords_ar" value="{{$setting->getTranslation('keywords','ar')}}" type="text" class="form-control" placeholder="{{trans('dashboard.keywords_ar')}}">
                                        @if($errors->has('keywords_ar'))
                                            <div class="error">{{ $errors->first('keywords_ar') }}</div>
                                        @endif
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.keywords_en')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input required name="keywords_en" value="{{$setting->getTranslation('keywords','en')}}" type="text" class="form-control" placeholder="{{trans('dashboard.keywords_en')}}">
                                        @if($errors->has('keywords_en'))
                                            <div class="error">{{ $errors->first('keywords_en') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.author_ar')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input required name="author_ar" value="{{$setting->getTranslation('author','ar')}}" type="text" class="form-control" placeholder="{{trans('dashboard.author_ar')}}">
                                        @if($errors->has('author_ar'))
                                            <div class="error">{{ $errors->first('author_ar') }}</div>
                                        @endif
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.author_en')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input required name="author_en" value="{{$setting->getTranslation('author','en')}}" type="text" class="form-control" placeholder="{{trans('dashboard.author_en')}}">
                                        @if($errors->has('author_en'))
                                            <div class="error">{{ $errors->first('author_en') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.title_ar')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input name="title_ar" value="{{$setting->getTranslation('title','ar')}}" type="text" class="form-control" placeholder="title_ar">
                                        @if($errors->has('title_ar'))
                                            <div class="error">{{ $errors->first('title_ar') }}</div>
                                        @endif
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.title_en')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input name="title_en" value="{{$setting->getTranslation('title','en')}}" type="text" class="form-control" placeholder="{{trans('dashboard.title_en')}}">
                                        @if($errors->has('title_en'))
                                            <div class="error">{{ $errors->first('title_en') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.phone1')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input name="first_phone" value="{{$setting->first_phone}}" type="text" class="form-control" placeholder="{{trans('dashboard.phone1')}}">
                                        @if($errors->has('first_phone'))
                                            <div class="error">{{ $errors->first('first_phone') }}</div>
                                        @endif
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.phone2')}}</label>
                                    <div class="col-lg-4">
                                        <input name="second_phone" value="{{$setting->second_phone}}" type="text" class="form-control" placeholder="{{trans('dashboard.phone2')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.email')}}</label>
                                    <div class="col-lg-4">
                                        <input name="email" value="{{$setting->email}}" type="email" class="form-control" placeholder="{{trans('dashboard.email')}}">
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">Facebook</label>
                                    <div class="col-lg-4">
                                        <input name="facebook" value="{{$setting->facebook}}" type="text" class="form-control" placeholder="Facebook">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">Twitter</label>
                                    <div class="col-lg-4">
                                        <input name="twitter" value="{{$setting->twitter}}" type="text" class="form-control" placeholder="Twitter">
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">Instagram</label>
                                    <div class="col-lg-4">
                                        <input name="instagram" value="{{$setting->instagram}}" type="text" class="form-control" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">WhatsApp</label>
                                <div class="col-lg-4">
                                    <input name="whatsApp" value="{{$setting->whatsApp}}" type="text" class="form-control" placeholder="WhatsApp">
                                </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold">Telegram</label>
                                    <div class="col-lg-4">
                                        <input name="telegram" value="{{$setting->telegram}}" type="text" class="form-control" placeholder="Telegram">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.address_ar')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea required name="address_ar"  type="text" class="form-control" placeholder="{{trans('dashboard.address_ar')}}">{{$setting->getTranslation('address','ar')}}
                                        </textarea>
                                        @if($errors->has('address_ar'))
                                            <div class="error">{{ $errors->first('address_ar') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.address_en')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea required name="address_en"  type="text" class="form-control" placeholder="{{trans('dashboard.address_en')}}">{{$setting->getTranslation('address','en')}}</textarea>
                                        @if($errors->has('address_en'))
                                            <div class="error">{{ $errors->first('address_en') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.description_ar')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        {{--                                        id="summernote"--}}
                                        <textarea required name="description_ar"  class="form-control" placeholder="{{trans('dashboard.description_ar')}}">{{$setting->getTranslation('description','ar')}}</textarea>
                                        @if($errors->has('description_ar'))
                                            <div class="error">{{ $errors->first('description_ar') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.description_en')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        {{--                                        id="summernote"--}}
                                        <textarea required name="description_en"  class="form-control" placeholder="{{trans('dashboard.description_en')}}">{{$setting->getTranslation('description','en')}}</textarea>
                                        @if($errors->has('description_en'))
                                            <div class="error">{{ $errors->first('description_en') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{trans('dashboard.logo')}}<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="mb-3">
                                            <img style="width: 100px" height="100px" src="{{asset($setting->logo)}}" alt="">
                                        </div>
                                        <input name="logo" accept="image/*" type="file"  class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                        @if($errors->has('logo'))
                                            <div class="error">{{ $errors->first('logo') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <hr>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
{{--    <script>--}}
{{--    $(document).ready(function() {--}}
{{--    $('#summernote').summernote();--}}
{{--    });--}}
{{--    </script>--}}
@endsection

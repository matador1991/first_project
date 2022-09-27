@extends('layouts.adminLayout')
@section('css')
    @toastr_css
@section('title')
    Admins Menu
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title  pt-5">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sidebar.admin')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sidebar.admin-menu')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if(!empty($errors) && $errors->count() > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="align-content-center">{{ $errors->first() }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('admin.name')}}</th>
                                <th>{{trans('admin.email')}}</th>
                                <th>{{trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($admins) && $admins->count() != null)
                                @php
                                    $i=0;
                                @endphp
                            @foreach($admins as $admin)
                                @php
                                $i++;
                                @endphp
                            <tr>
                                <td style="width: 20px">{{$i}}</td>
                                <td style="width: 100px">{{$admin->name}}</td>
                                <td style="width: 20px">{{$admin->email}}</td>
                                <td style="width: 200px">
                                        <a href="" data-toggle="modal" data-target="#editModal-{{$admin->id}}"
                                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('admin.changePassword')}}</a>
                                        <div class="modal fade" id="editModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal">{{trans('admin.changePassword')}}</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('admin.update')}}" method="post" class="form-control">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="text" hidden name="id" value="{{$admin->id}}">
                                                        <h4 class="form-section"><i class="ft-home"></i> {{trans('admin.data')}} </h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">
                                                                        {{trans('admin.password')}}
                                                                    </label>
                                                                    <input type="password"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           value="{{old('name')}}"
                                                                           name="password">
{{--                                                                    @if($errors->has('password'))--}}
{{--                                                                        <div class="error">{{ $errors->first('password') }}</div>--}}
{{--                                                                    @endif--}}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">
                                                                        {{trans('admin.password_confirmation')}}
                                                                    </label>
                                                                    <input type="password"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           value="{{old('name')}}"
                                                                           name="password_confirmation">
{{--                                                                    @if($errors->has('password_confirmation'))--}}
{{--                                                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>--}}
{{--                                                                    @endif--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-dark btn-min-width box-shadow-3 mr-1 mb-1" type="button" data-dismiss="modal">{{trans('dashboard.cancel')}}</button>
                                                        <button type="submit" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" >{{trans('dashboard.update')}}</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')

    </script>
@endsection

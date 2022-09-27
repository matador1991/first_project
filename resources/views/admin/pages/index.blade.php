@extends('layouts.adminLayout')
@section('css')
@section('title')
    {{trans('sidebar.page')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title  pt-5">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sidebar.page')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sidebar.page-menu')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('page.name')}}</th>
                                <th>{{trans('page.image')}}</th>
                                <th>{{trans('service.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($pages) && $pages->count() != null)
                                @php
                                    $i=0;
                                @endphp
                            @foreach($pages as $page)

                                @php
                                $i++;
                                @endphp
                            <tr>
                                <td style="width: 20px">{{$i}}</td>
                                <td style="width: 100px">{{$page->name}}</td>
                                <td style="width: 20px">
                                    <img style="width: 100px; height: 100px" src="{{asset($page->image)}}">
                                </td>
                                <td style="width: 200px">
                                        <a href="{{route('page.edit',$page->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                            {{trans('page.edit')}}</a>
                                    <a href="#" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                       data-toggle="modal" data-target="#deleteModal-{{$page->id}}">{{trans('dashboard.delete')}}</a>
                                    <div class="modal fade" id="deleteModal-{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal">{{trans('dashboard.checkDelete')}}</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-dark btn-min-width box-shadow-3 mr-1 mb-1" type="button" data-dismiss="modal">{{trans('dashboard.cancel')}}</button>
                                                    <a class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" href="{{route('page.delete',$page->id)}}">{{trans('dashboard.delete')}}</a>
                                                </div>
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


@endsection

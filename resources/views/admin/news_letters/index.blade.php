@extends('layouts.adminLayout')
@section('css')
@section('title')
    {{trans('sidebar.member')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title  pt-5">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('sidebar.member')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('sidebar.member-menu')}}</li>
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
                                <th>{{trans('member.name')}}</th>
                                <th>{{trans('member.position')}}</th>
                                <th>{{trans('member.image')}}</th>
                                <th>{{trans('member.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($members) && $members->count() != null)
                                @php
                                    $i=0;
                                @endphp
                            @foreach($members as $member)

                                @php
                                $i++;
                                @endphp
                            <tr>
                                <td style="width: 20px">{{$i}}</td>
                                <td style="width: 100px">{{$member->name}}</td>
                                <td style="width: 100px">{{$member->position}}</td>
                                <td style="width: 20px">
                                    <img style="width: 100px; height: 100px" src="{{asset($member->image)}}">
                                </td>
                                <td style="width: 200px">
                                        <a href="{{route('member.edit',$member->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{trans('project.edit')}}</a>
                                    <a href="#" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                       data-toggle="modal" data-target="#deleteModal-{{$member->id}}">{{trans('dashboard.delete')}}</a>
                                    <div class="modal fade" id="deleteModal-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
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
                                                    <a class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" href="{{route('member.delete',$member->id)}}">{{trans('dashboard.delete')}}</a>
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

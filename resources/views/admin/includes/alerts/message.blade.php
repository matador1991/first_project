@if(Session::has('message'))
<div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
    <strong class="align-content-center">{{Session::get('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{--@if(Session::has('message'))--}}
{{--    <div class="row mr-2 ml-2">--}}
{{--        <button type="text" class="btn btn-lg btn-block btn-outline-{{ session('alert-type') }} mb-2"--}}
{{--                id="type-error" >{{Session::get('message')}}--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

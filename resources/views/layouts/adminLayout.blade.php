<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{$settings[0]->keywords}}" />
    <meta name="description" content="{{$settings[0]->description}}" />
    <meta name="author" content="{{$settings[0]->author}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.includes.head')

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('admin.includes.main-header')

        @include('admin.includes.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')
            @include('admin.includes.alerts.message')

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('admin.includes.footer')
        </div><!-- main content wrapper end-->
    </div>

{{--    </div>--}}
{{--    </div>--}}

    <!--=================================
 footer -->

    @include('admin.includes.footer-scripts')

    @yield('js')

</body>

</html>

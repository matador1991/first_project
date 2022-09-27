<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('admin/assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('admin/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet">
<link href="{{ URL::asset('admin/assets/css/plugins/switchery.min.css') }}" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('admin/assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('admin/assets/css/rtl.css') }}" rel="stylesheet">
@endif

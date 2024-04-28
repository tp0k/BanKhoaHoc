@php
    $appNameParts = preg_split('/(?=[A-Z])/', env('APP_NAME'), -1, PREG_SPLIT_NO_EMPTY);
    $firstPart = isset($appNameParts[0]) ? $appNameParts[0] : ''; // Lấy phần đầu tiên của chuỗi
    $secondPart = isset($appNameParts[1]) ? $appNameParts[1] : ''; // Lấy phần thứ hai của chuỗi
@endphp
<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- <title>{{ENV('APP_NAME')}} | @yield('title') </title> --}}
    <title>@yield('title') - {{ $firstPart }} {{ $secondPart }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logovuong.jpg')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--**********************************
        Content body start
    ***********************************-->

    @yield('content')

    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/dlabnav-init.js')}}"></script>
    <!--endRemoveIf(production)-->

    {{-- TOASTER --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script>
        @if(Session::has('success'))  
    				toastr.success("{{ Session::get('success') }}");  
    		@endif  
    		@if(Session::has('info'))  
    				toastr.info("{{ Session::get('info') }}");  
    		@endif  
    		@if(Session::has('warning'))  
    				toastr.warning("{{ Session::get('warning') }}");  
    		@endif  
    		@if(Session::has('error'))  
    				toastr.error("{{ Session::get('error') }}");  
    		@endif  
    </script>
</body>

</html>
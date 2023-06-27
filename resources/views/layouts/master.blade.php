<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    {{-- links de styles  --}}
    @include('layouts.head')
</head>

<body>
    <div class="wrapper " >

        {{-- side bar here --}}
        @include('layouts.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
          @include('layouts.navbar')
            <!-- End Navbar -->

            {{-- here is content  --}}
            <div class="content">
                <div class="container-fluid"> 
                   
                        
                            @yield('content')
                       
                </div>
            </div>
           {{-- here is footer  --}}
        @include('layouts.footer')
        </div>
        
    </div>
    
</body>
{{-- javascript files  --}}
@include('layouts.script')
</html>

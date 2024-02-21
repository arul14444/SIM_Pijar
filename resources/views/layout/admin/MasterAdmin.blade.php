<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="{{ asset('template/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
</head>
<body>
   {{-- nav --}}
   @include('partial.Nav')
    <div id="layoutSidenav">
        @include('partial.SidebarAdmin')
        {{--sidebar--}}
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">@yield('title')</h1>
                    <ol class="breadcrumb mb-4">
                        @yield('route')
                    </ol>
                    <div class="card mb-4">
                            @stack('script')
                            @yield('content')
                    </div>
                </div>
            </main>
            {{-- Footer --}}
            @include('partial.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src= {{ asset("template/js/scripts.js")}}></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="{{ asset('resources/css/app.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
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
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mt-4">@yield('title')</h2>
                            <ol class="breadcrumb mb-4">
                                @yield('route')
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 mt-4 p-3" id="responseMessage"></div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            @stack('script')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
            {{-- Footer --}}
            @include('partial.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src= {{ asset('resources/js/script.js')}}></script>
</body>
</html>

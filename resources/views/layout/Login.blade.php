<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{url('asset/logoYayasan3yayasan.png')}}" type="image/png">
    <title>Login - SIM Pijar</title>
    <link rel="icon" href="{{url('asset/logoYayasan3.png')}}" type="image/png">
    <link href="{{ asset('resources/css/app.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100vh; /* Set tinggi body menjadi tinggi viewport */
        }
        #layoutAuthentication {
            display: flex;
            justify-content: center;
            align-items: center; 
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center; 
            width: 100%;
            height: 100%;
            filter: blur(8px);
            background-image: url('{{ asset('asset/kegiatan.jpg') }}');
              /* Add the blur effect */
            -webkit-filter: blur(6px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;  
        }

        #layoutAuthentication_content {
            padding: 10%;
            transform: translate(0%, -120%)

        }
        
    </style>
</head>
<body class="--bs-greay-bg">
    <div id="layoutAuthentication">
        
    </div>
    <div id="layoutAuthentication_content">                
        <main>
            <div class="row">
                <div class="kiri col-sm d-flex justify-content-center align-items-center">
                    <img src="{{asset('asset/LogoYayasan.png')}}" class="img-fluid" alt="..." style="max-width: 150%; ">
                </div>
                <div class="kanan col-sm">
                    <div class="container">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{$item}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="username" name="username" type="text" placeholder="username" value="{{old('username')}}" />
                                        <label for="username">username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                        <label for="password">Password</label>
                                    </div>
                                    {{-- show passwprd --}}
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                                        <label class="form-check-label" for="showPassword">Tampilkan password</label>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                        {{-- <a class="small" href="password.html">Lupa Password?</a> --}}
                                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">Yayasan Pijar Mutiara Bangsa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    {{-- <script src="js/scripts.js"></script> --}}
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.querySelector("button"); // Sesuaikan selector jika perlu
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>

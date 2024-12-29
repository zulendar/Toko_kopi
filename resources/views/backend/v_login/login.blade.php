<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/icon_univ_bsi.png') }}">
    <title>Toko Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Animasi fade-in untuk elemen */
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);

                scale: 0.5;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                scale: 1;
            }
        }

        
        .slide-in {
            animation: slideIn 1s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

       
        .alert {
            animation: alertFadeIn 1s ease-out forwards;
        }

        @keyframes alertFadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #d1c4b5;">
        <div class="auth-box p-4 bg-white border rounded shadow-lg fade-in" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4 slide-in">
                <img style="width: 150px;"
                    src="https://png.pngtree.com/png-clipart/20211201/ourlarge/pngtree-coffee-shop-flat-brown-building-illustration-png-image_4043631.png"
                    alt="logo" />
            </div>

            <!-- Error message -->
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif

            <!-- Login Form -->
            <form id="loginform" class="form-horizontal fade-in" action="{{ route('backend.login') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #a2896b; color: white;"><i
                                    class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Masukkan Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #a2896b; color: white;"><i
                                    class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="form-control" placeholder="Masukkan Password" required>
                    </div>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center">
                    <button class="btn btn-block" style="background-color: #a2896b; color: white;" type="submit">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                </div>

                <!-- Lost password link -->
                <div class="text-right">
                    <button class="btn btn-link" id="to-recover" type="button" style="color: #a2896b;">Lost
                        password?</button>
                </div>
            </form>

            <!-- Recover Password Form -->
            <form id="recoverform" style="display: none;">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter your email address">
                </div>
                <div class="form-group d-flex justify-content-between align-items-center">
                    <button class="btn btn-link" id="to-login" style="color: #a2896b;" type="button">Kembali</button>
                    <button class="btn btn-block" style="background-color: #a2896b; color: white;" type="button">
                        <i class="fas fa-sync-alt mr-2"></i>Recover
                    </button>
                </div>
            </form>
        </div>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        
        $('#toggle-password').on('click', function () {
            var passwordField = $('#password');
            var eyeIcon = $('#eye-icon');
            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        $('#to-recover').on("click", function () {
            $("#loginform").hide();  
            $("#recoverform").fadeIn();  
        });

        $('#to-login').on("click", function () {
            $("#recoverform").hide();  
            $("#loginform").fadeIn(); 
        });
    </script>
</body>

</html>

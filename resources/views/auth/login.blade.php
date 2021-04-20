<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Version" content="v1.0.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="{{asset('frontAsset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontAsset/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontAsset/css/remixicon.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontAsset/line.css')}}">
    <link href="{{asset('frontAsset/css/style.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<div class="back-to-home rounded d-none d-sm-block">
    <a href="/" class="btn btn-icon btn-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- Hero Start -->
<section class="bg-home d-flex bg-light align-items-center" style="background: url('{{asset('images/bg/bg-lines-one.png')}}') center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <img src="images/logo-dark.png" height="24" class="mx-auto d-block" alt="">
                <div class="card login-page bg-white shadow mt-4 rounded border-0">
                    <div class="card-body">
                        <h4 class="text-center">Connexion</h4>
                        <form method="POST" action="{{ route('login') }}" class="login-form mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input align-middle" type="checkbox" name="remember" id="remember-check" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember-check">Remember me</label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="text-dark h6 mb-0" href="{{ route('password.request') }}">
                                                Mot de passe oublié
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                          Se connecter
                                        </button>


                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2"> Vous n'avez pas encore de compte ?</small>
                                        <a href="{{route('register')}}" class="text-info fw-bold">S'inscrire</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->


<script src="{{asset('frontAsset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontAsset/js/feather.min.js')}}"></script>
<script src="{{asset('frontAsset/js/app.js')}}"></script>
</body>
</html>


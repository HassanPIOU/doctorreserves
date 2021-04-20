<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | Inscription</title>
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
            <div class="col-lg-8 col-md-8">
                <img src="images/logo-dark.png" height="24" class="mx-auto d-block" alt="">
                <div class="card  bg-white shadow mt-4 rounded border-0">
                    <div class="card-body">
                        <h4 class="text-center">Inscription</h4>
                        <br>
                        <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input align-middle" type="checkbox"  name="pro" value="1" id="pro">
                                        <label class="form-check-label" for="pro">Professionnel de la médécine</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Prénom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" onfocus="" name="firstname" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="lastname" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="" name="password" required="" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Confirmer le mot de passe<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" placeholder="" name="password_confirmation" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input align-middle" type="checkbox" required value="" id="accept-tnc-check">
                                        <label class="form-check-label" for="accept-tnc-check">J'accepte les <a href="#" class="text-primary">Termes et Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">S'inscrire</button>
                                </div>
                            </div>

                            <div class="mx-auto">
                                <p class="mb-0 mt-3"><small class="text-dark me-2">Vous avez déjà un compte ?</small> <a href="{{route('login')}}" class="text-dark fw-bold">Connexion</a></p>
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



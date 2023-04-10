<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>MiniatureCars</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <link rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    @vite(['resources/css/theme.css'])

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../css/theme.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"><span
                        class="text-1000 fs-3 fw-bold ms-2 text-gradient">MiniatureCars</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                    </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
                    <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                    </div>

                    </div>
                    @guest
                        <a class="btn btn-white shadow-warning text-warning" href="{{ route('login') }}"> <i
                                class="fas fa-user me-2"></i>{{ __('Login') }}</a>
                    @else
                    <button class="shadow-warning text-warning mx-4" style="border-radius:50%;border:0">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <button class="shadow-warning text-warning" type="submit" style="border-radius:50%;border:0"> <i class="fas fa-user"></i></button>
                    @endguest
                    </form>

                    
                </div>
            </div>
        </nav>
        <section class="py-4 overflow-hidden bg-primary" id="home">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-md-4 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner"
                            href="#!"><img class="img-fluid" src="assets/img/gallery/hero-header-1.webp"
                                alt="hero-header" /></a></div>
                    <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                        <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Colecciona tus sueños</h1>
                        <h1 class="text-800 mb-5 fs-4">Vive la pasión por los coches en miniatura</h1>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->

        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->

        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-4 overflow-hidden">

            <div class="container">
                <div class="row h-100">
                    <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
                        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Vehiculos en venta</h5>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach ($productos as $producto)
                                <div class="col-sm-6 col-md-3 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3">
                                        <div class="text-center"
                                            style="width:100%; height:220px;background-size: contain;
                                    background-repeat: no-repeat;
                                     background-image:url( '{{ asset('img/productos/' . $producto->imagen) }}')">
                                        </div>
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">{{ $producto->nombre }}
                                            </h5>
                                            <div><span
                                                    class="text-primary">{{ $producto->descripcion
                                                     }}</span></div><span
                                                class="text-1000 fw-bold">{{ $producto->precio }} €</span>
                                        </div>
                                    </div>
                                    @if ($producto->stock > 0)
                                        <div class="d-grid gap-2"><button type="button" class="btn btn-lg btn-danger"
                                                href="#!" role="button">Añade al carrito</button>
                                        </div>
                                    @elseif($producto->stock <= 0)
                                        <div class="d-grid gap-2"><button type="button" class="btn btn-lg btn-dark"
                                                disabled href="#!" role="button">Sin stock</button>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div><!-- end of .container-->

        </section>


        <!-- <section> close ============================-->
        <!-- ============================================-->


        <section class="py-0 pt-7 bg-1000">

            <div class="container">

                <div class="col-12 col-md-8 col-lg-6 col-xxl-4">
                    <h5 class="lh-lg fw-bold text-500">FOLLOW US</h5>
                    <div class="text-start my-3"> <a href="#!">
                            <i class="fas fa-instagram fa-w-14 fs-2 me-2" aria-hidden="true"
                               ></i></a><a href="#!">
                            <svg class="svg-inline--fa fa-facebook fa-w-16 fs-2 mx-2" aria-hidden="true"
                                focusable="false" data-prefix="fab" data-icon="facebook" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#BDBDBD"
                                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                                </path>
                            </svg></a><a href="#!">
                            <svg class="svg-inline--fa fa-twitter fa-w-16 fs-2 mx-2" aria-hidden="true"
                                focusable="false" data-prefix="fab" data-icon="twitter" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#BDBDBD"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg></a></div>
                    <h3 class="text-500 my-4">Receive exclusive offers and <br />discounts in your mailbox</h3>
                    <div class="row input-group-icon mb-5">
                        <div class="col-auto"><i class="fas fa-envelope input-box-icon text-500 ms-3"></i>
                            <input class="form-control input-box bg-800 border-0" type="email"
                                placeholder="Enter Email" aria-label="email" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border border-800" />
            <div class="row flex-center pb-3">
                <div class="col-md-6 order-0">
                    <p class="text-200 text-center text-md-start">All rights Reserved &copy; Your Company, 2021</p>
                </div>
                <div class="col-md-6 order-1">
                    <p class="text-200 text-center text-md-end"> Made with&nbsp;
                        <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15"
                            height="15" fill="#FFB30E" viewBox="0 0 16 16">
                            <path
                                d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                            </path>
                        </svg>&nbsp;by&nbsp;<a class="text-200 fw-bold" href="https://themewagon.com/"
                            target="_blank">ThemeWagon
                        </a>
                    </p>
                </div>
            </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap"
        rel="stylesheet">
</body>

</html>

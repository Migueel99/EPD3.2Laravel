<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body style="background-color: #F1592A;">
    <div class="container mt-5 pt-5 " >
        <div class="alert alert bg-#F2522E text-center ">
            <h2 class="display-3 fw-bolder">Error 404</h2>
            <h3 class="display-5 text fw-bolder">{{__('Oops! Something is wrong.')}}</h3>
            <a href="{{ route('inicio') }}" class="btn btn-warning mb-3 mt-3">{{__('Go Back')}}</a>
            <img src="{{ asset('img/EbhcDKiU4AINtMS.jpg') }}" alt="Imag" width="50%" class="img-fluid mx-auto d-block my-auto img-smaller mb-5">
        </div>

    </div>
</body>
</html>

<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])

</head>

<body>

    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="">
                        <h1 class="text-1000  fw-bold  text-gradient">MiniatureCars</h1>
                    </a>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Perfil de {{ Auth::user()->name }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Email: {{ Auth::user()->email }}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Telf:{{ Auth::user()->telefono }}</p>

                                    <div>
                                        <a href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button class="btn btn-primary mx-2 px-auto">Logout</button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                        <a href="{{ route('inicio') }}"><button type="button" class="btn btn-primary mx-2 px-auto">Volver</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
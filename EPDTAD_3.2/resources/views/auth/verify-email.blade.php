@extends('auth.template')

@section('content')
    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-wrapper col-12 col-md-6 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="index.html"><h1
                        class="text-1000  fw-bold  text-gradient">MiniatureCars</h1></a>
                </div>
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Verify Your Email Address</h4>
                        <div class="alert alert-success" role="alert">
                            You must verify your email address. Please, check your email for a verification link
                        </div>
                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email, <a href="{{ route('verification.send') }}">click here to request another</a>.
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

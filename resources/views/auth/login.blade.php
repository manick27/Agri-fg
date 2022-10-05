@extends('layout')

@section('title')
    Login | Agri FG
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 intro-text">
                            <h1>AGRI FG Administration</h1>
                            <p>AGRI FG Administration gérer le site.</p>
                            <a href="#connexion" class="btn btn-custom btn-lg page-scroll">Plus d'infos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    @if ($errors->has('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @elseif($errors->has('password'))
        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
    @endif
    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="flex">
                <div class="w-50">
                    <img class="w-100" src="{{ asset('asset/img/login.png') }}" alt=""></a>
                </div>
                <div class="w-50" id="connexion">
                    <div class="text-center mt-80">
                        <h2>Connectez Vous</h2>
                    </div>
                    <form method="POST" action="{{ route('authenticate') }}">
                        @csrf
                        <div class="w-100 mt-20">
                            <input type="text" name="email" placeholder="Votre Email" class="w-100 form-control">
                        </div>
                        <div class="w-100 mt-20">
                            <input type="password" name="password" placeholder="Mot de Passe" class="w-100 form-control">
                        </div>
                        <div class="w-fit m-auto mt-20">
                            <button type="submit" class="btn btn-custom btn-lg">Connexion</button>
                            {{-- <input type="submit" class="btn btn-custom btn-lg" value="Connexion" /> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection

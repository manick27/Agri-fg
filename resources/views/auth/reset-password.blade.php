@extends('layout')

@section('title')
    Reset Password | Vision Bio
@endsection

@section('content')

	@if (session('message'))
		<div class="alert alert-danger">{{ session('message') }}</div>
	@endif

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
					<img src="{{ asset('asset/img/forgot.png') }}" alt=""></a>
                </div>
                <div class="col-lg-6">
                    <div class="contact__form__title">
                        <h2>Réinitialiser le mot de passe</h2>
                    </div>
					<form method="POST" action="/reset-password">
						@csrf
						<div class="col-lg-12">
							<input type="text"  name="email" placeholder="Votre Email">
						</div>
						<div class="col-lg-12">
							<input type="password" name="password"  placeholder="Mot de Passe">
						</div>
						<div class="col-lg-12">
							<input type="password"  name="password_confirmation" placeholder="Confirmer votre Mot de Passe">
						</div>
						<div class="col-lg-12">
							<button type="submit" style="width: 100%" class="site-btn">Réinitialiser</button>
						</div>
           			</form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

@endsection
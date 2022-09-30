@extends('layout')

@section('title')
    Forgot Password | Vision Bio
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
                        <h2>Mot de Passe Oublié ?</h2>
						<p>Remplire le formlaire et envoyer le lien de réinitialisation du mot de passe</p>
                    </div>
					<form method="POST" action="/forgot-password">
						@csrf
						<div class="col-lg-12">
							<input type="text"  name="email" placeholder="Votre Email">
						</div>

						<div class="col-lg-12">
							<button type="submit" style="width: 100%" class="site-btn">Envoyer le lien</button>
						</div>
           			</form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

@endsection

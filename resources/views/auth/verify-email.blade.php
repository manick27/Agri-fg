@extends('layout')

@section('title')
    Verify Email | Vision Bio
@endsection

@section('content')

	@if (session('message'))
		<div class="alert alert-danger">{{ session('message') }}</div>
	@endif

	@if (session('status'))
		<div class="alert alert-success">{{ session('status') }}</div>
	@endif

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
					<img src="{{ asset('asset/img/email.png') }}" alt=""></a>
                </div>
                <div class="col-lg-6">
                    <div class="contact__form__title">
                        <h2>Verifier Votre Adresse Email ?</h2>
						<p>Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.</p>

						<p>Si vous n'avez pas reçu l'e-mail</p>
                    </div>
					<form method="POST"  action="/email/verification-notification">
						@csrf

						<div class="col-lg-12">
							<button type="submit" style="width: 100%" class="site-btn">Cliquez ici pour en demander un autre</button>
						</div>
           			</form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

@endsection

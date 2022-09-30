@extends('layout')

@section('title')
    Register | Vision Bio
@endsection

@section('content')

	@if (session('message'))
		<div class="alert alert-danger">{{ session('message') }}</div>
	@endif

	@if (session('status'))
		<div class="alert alert-success">{{ session('status') }}</div>
	@elseif($errors->has('name'))
		<div class="alert alert-danger">{{ $errors->first('name') }}</div>
	@elseif($errors->has('email'))
		<div class="alert alert-danger">{{ $errors->first('email') }}</div>
	@elseif($errors->has('password'))
		<div class="alert alert-danger">{{ $errors->first('password') }}</div>
	@elseif($errors->has('password_confirmation'))
		<div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
	@endif
    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
					<img src="{{ asset('asset/img/login.png') }}" alt=""></a>
                </div>
                <div class="col-lg-6">
                    <div class="contact__form__title">
                        <h2>Inscrivez Vous</h2>
                    </div>
					<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="col-lg-12">
							<input type="text"  name="email" placeholder="Votre Email">
						</div>
						<div class="col-lg-12">
							<input type="text"  name="name" placeholder="Votre Nom">
						</div>
						<div class="col-lg-12">
							<input type="text"  name="phone" placeholder="Votre Telephone">
						</div>
						<div class="col-lg-12">
							<input type="password" name="password"  placeholder="Mot de Passe">
						</div>
						<div class="col-lg-12">
							<input type="password"  name="password_confirmation" placeholder="Confirmer votre Mot de Passe">
						</div>
						<div class="row">
							<div class="col-lg-6 inline">
								<input type="checkbox" name="condition"><small>Termes et Condition</small>
							</div>
                        </div>
						<div class="col-lg-12">
							<button type="submit" style="width: 100%" class="site-btn">S'enregister</button>
						</div>
           			</form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

@endsection

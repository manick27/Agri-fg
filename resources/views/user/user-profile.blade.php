@extends('app')

@section('title')
    User Profile |  Clinic Computer
@endsection

@section('content')

<!-- style flash success -->
<style>
	* {
  box-sizing: border-box;
}


.flash {
  display: block;
  position: fixed;
  top: 25px;
  right: 25px;
  width: 350px;
  padding: 20px 25px 20px 85px;
  font-size: 16px;
  font-weight: 400;
  color: #66847C;
  background-color: #FFF;
  border: 2px solid #66847C;
  border-radius: 2px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
  opacity: 0;
}

.flash__icon {
  position: absolute;
  top: 50%;
  left: 0;
  width: 1.8em;
  height: 100%;
  padding: 0 0.4em;
  background-color: #66847C;
  color: #FFF;
  font-size: 36px;
  font-weight: 300;
  transform: translate(0, -50%);
}
.flash__icon .icon {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
}

@-webkit-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@-moz-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@-o-keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
@keyframes drop-in-fade-out {
  0% {
    opacity: 0;
    visibility: visible;
    -webkit-transform: translate3d(0, -200%, 0);
    -moz-transform: translate3d(0, -200%, 0);
    -ms-transform: translate3d(0, -200%, 0);
    -o-transform: translate3d(0, -200%, 0);
    transform: translate3d(0, -200%, 0);
  }
  12% {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  20% {
    opacity: 1;
  }
  70% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  80% {
    opacity: 0;
  }
  100% {
    visibility: hidden;
    -webkit-transform: translate3d(75%, 0, 0);
    -moz-transform: translate3d(75%, 0, 0);
    -ms-transform: translate3d(75%, 0, 0);
    -o-transform: translate3d(75%, 0, 0);
    transform: translate3d(25%, 0, 0);
  }
}
.animate--drop-in-fade-out {
  -webkit-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -moz-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -ms-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  -o-animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
  animation: drop-in-fade-out 3.5s 0.4s cubic-bezier(.32,1.75,.65,.91);
}

#top-header .container{
	margin-bottom:15px;
}

#header .container img{
	height:70px;
	width:200px;
}


</style>



	<div class="flash">
		<div class="flash__icon">
			<i class="icon fa fa-check-circle-o"></i>
		</div>
		<p class="flash__body">
			Lien Copié
		</p>
	</div>

    <section class="blog-details-hero set-bg" data-setbg="{{ asset('asset/img/blog/details/details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


		<section class="cover-sec" id="main">
			@if(session('message'))
				<div class="alert alert-success"><b>Well done ! </b> {{ session('message') }}.</div>
			@endif
			@if(session('error'))
				<div class="alert alert-danger"><b>Danger ! </b> {{ session('error') }}.</div>
			@endif
			{{-- <img src="{{ asset('frontend/images/bana.jpg') }}" alt="cover" style="width: 100%; height: 100px;"> --}}
		</section>





        <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            {{-- <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form> --}}
                            <div class="">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        {{-- <img src="{{ asset('asset/img/blog/details/details-author.jpg') }}" alt=""> --}}
                                        <img src="{{ asset('avatars/' . Auth::user()->avatar ) }}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <span>{{ Auth::user()->email }}</span>
                                        <small>{{ Auth::user()->phone }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tableau de bord</h4>
                            {{-- <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul> --}}
                            <ul>
                                <li data-tab="saved-jobs"  class="active">
                                    <a href="#" title="">
                                        <img src="{{ asset('frontend/images/ic1.png') }}" alt="">
                                        <span>Mon Budget</span>
                                    </a>
                                </li>

                                <li data-tab="following-posts">
                                    <a href="#" title="">
                                        <img src="{{ asset('frontend/images/ic4.png') }}" alt="">
                                        <span>Mes Achats <b>(0)</b></span>
                                    </a>
                                </li>
                                <li data-tab="following-users">
                                    <a href="#" title="">
                                        <img src="{{ asset('frontend/images/ic4.png') }}" alt="">
                                        <span>Parrainés <b>({{ Auth::user()->childUsers(Auth::user()->id)->count() }})</b></span>
                                    </a>
                                </li>
                                @if(Auth::user())
                                    <li data-tab="update-account">
                                        <a href="#" title="">
                                            <img src="{{ asset('frontend/images/ic6.png') }}" alt="">
                                            <span>Update Profile</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <div class="blog__sidebar__recent">
                                <div class="widget-about bid-place">
                                    <input class="mb-2" type="text" value="https://computerclinicshop.com/parent/registration/form/{{ Auth::user()->user_uid }}" id="myInput" disabled style="width: 240px;">
                                    <button class="btn btn-primary mb-3" onclick="myFunction()">Copier Lien Parrainage</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <div class="product-feed-tab current" id="saved-jobs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">Disponible</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="post-bar col-lg-9">
                                        <div class="post_topbar">
                                            <div class="wordpressdevlp">
                                                <h2>Votre solde disponible</h2>
                                                <p>Cette somme est prete a etre retiré</p>
                                            </div>
                                            <ul class="savedjob-info mangebid manbids">

                                                <li>
                                                    <h3>Montant en XAF</h3>
                                                    <h1>{{ Auth::user()->available }}</h1>
                                                </li>

                                                 <ul class="bk-links bklink flw-hr">
                                                    <li><a href="/user-profile" title="" class="hre">Actualiser</a></li>
                                                </ul>
                                            </ul>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->







		<main id="main1">
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
											<img src="{{ asset('avatars/' . Auth::user()->avatar ) }}" alt="" style="width: 170px; height: 170px;">
										</div><!--user-pro-img end-->
										<div class="user_pro_status">
											<div class="user-tab-sec">
												<h3>{{ Auth::user()->name }}</h3>
												<h6>{{ Auth::user()->email }}</h6>
												<h6>{{ Auth::user()->phone }}</h6>

											</div>

										</div><!--user_pro_status end-->

										<ul>
											<div class="widget-about bid-place">
												<input class="mb-2" type="text" value="https://computerclinicshop.com/parent/registration/form/{{ Auth::user()->user_uid }}" id="myInput" disabled style="width: 240px;">
												<button class="btn btn-primary mb-3" onclick="myFunction()">Copier Lien Parrainage</button>
											</div>
										</ul>

									</div><!--user_profile end-->
									<div class="mt mb">
										<img src="{{ asset('cni/' . Auth::user()->cni ) }}" alt="" style="width: 250px; height: 140px;">
									</div>

								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-9">
								<div class="main-ws-sec">
									<div class="user-tab-sec">
									<h3>Tableau de Bord</h3>
										<div class="tab-feed st2 settingjb">
											<ul>
												<li data-tab="saved-jobs"  class="active">
													<a href="#" title="">
														<img src="{{ asset('frontend/images/ic1.png') }}" alt="">
														<span>Mon Budget</span>
													</a>
												</li>

												<li data-tab="following-posts">
													<a href="#" title="">
														<img src="{{ asset('frontend/images/ic4.png') }}" alt="">
														<span>Mes Achats <b>(0)</b></span>
													</a>
												</li>
												<li data-tab="following-users">
													<a href="#" title="">
														<img src="{{ asset('frontend/images/ic4.png') }}" alt="">
														<span>Parrainés <b>({{ Auth::user()->childUsers(Auth::user()->id)->count() }})</b></span>
													</a>
												</li>
												@if(Auth::user())
													<li data-tab="update-account">
														<a href="#" title="">
															<img src="{{ asset('frontend/images/ic6.png') }}" alt="">
															<span>Update Profile</span>
														</a>
													</li>
												@endif
											</ul>
										</div><!-- tab-feed end-->

										<div class="product-feed-tab current" id="saved-jobs">
											<ul class="nav nav-tabs" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">Disponible</a>
												</li>

											</ul>

											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
													<div class="post-bar col-lg-9">
														<div class="post_topbar">
															<div class="wordpressdevlp">
																<h2>Votre solde disponible</h2>
																<p>Cette somme est prete a etre retiré</p>
															</div>
															<ul class="savedjob-info mangebid manbids">

																<li>
																	<h3>Montant en XAF</h3>
																	<h1>{{ Auth::user()->available }}</h1>
																</li>

 																<ul class="bk-links bklink flw-hr">
																	<li><a href="/user-profile" title="" class="hre">Actualiser</a></li>
																</ul>
															</ul>
															<br>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="product-feed-tab" id="following-posts">
											<div class="posts-section">
												<div class="post-bar col-lg-12">
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Nom Produit</h3>
                                                            <p></p>
                                                        </li>
                                                        <li>
                                                            <h3>Quantité</h3>
                                                            <p></p>
                                                        </li>
                                                        <li>
                                                            <h3>Montant Total</h3>
                                                            <p></p>
                                                        </li>
														<li>
                                                            <h3>Date</h3>
                                                            <p></p>
                                                        </li>
														<li>
                                                            <h3>Status</h3>
                                                            <p></p>
                                                        </li>
                                                    </ul>
                                                </div>
											</div><!--posts-section end-->
										</div><!--product-feed-tab end-->
										<div class="product-feed-tab" id="following-users">
											<div class="posts-section">
											@foreach (Auth::user()->childUsers(Auth::user()->id) as $childUser)
												<div class="post-bar col-lg-12">
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Nom d'utilisateur</h3>
                                                            <p>{{ $childUser->name }}</p>
                                                        </li>
                                                        <li>
                                                            <h3>Email</h3>
                                                            <p>{{ $childUser->email }}</p>
                                                        </li>
														<li>
                                                            <h3>Status des Achats</h3>
                                                            <p>{{ $childUser->hasActiveBudget($childUser->id) }}</p>
                                                        </li>
                                                    </ul>
                                                </div>
											@endforeach
											</div><!--posts-section end-->
										</div><!--product-feed-tab end-->
										<div class="product-feed-tab" id="update-account">

											<div class="add-billing-method">
												<h3>Update Profile</h3>
												<div class="payment_methods">
													<form method="POST" action="/user/{{ Auth::user()->id }}/update/profile" enctype="multipart/form-data">
														@csrf
														<div class="row">
															<div class="col-lg-12">
																<div class="cc-head">
																	<h5>Votre carte d'identité sous forme d'image (face principal)</h5>
																</div>
																<div class="custom-file">
																	<input type="file" name="cni" class="custom-file-input" accept="image/x-png,image/jpg,image/gif,image/jpeg" onchange="loadFile(event)">
																	<label class="custom-file-label" for="customFile">@if(Auth::user()->cni != "cni.jpeg") {{ Auth::user()->cni }} @else Upload cni. Max size : 2MB @endif</label>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-6">
																<div class="cc-head">
																	<h5>First Name</h5>
																</div>
																<div class="inpt-field">
																	<input type="text" name="first_name" value="{{ Auth::user()->first_name }}" placeholder="">
																</div><!--inpt-field end-->
															</div>
															<div class="col-lg-6">
																<div class="cc-head">
																	<h5>Last Name</h5>
																</div>
																<div class="inpt-field">
																	<input type="text" name="last_name" value="{{ Auth::user()->last_name }}" placeholder="">
																</div><!--inpt-field end-->
															</div>
															<div class="col-lg-6">
																<div class="rowwy">
																	<div class="row">
																		<div class="col-lg-6 pd-left-none no-pd">
																			<div class="cc-head">
																				<h5>Country</h5>
																			</div>
																			<div class="inpt-field">
																				<input type="text" name="country" value="{{ Auth::user()->country }}" placeholder="">
																			</div><!--inpt-field end-->
																		</div>
																		<div class="col-lg-6 pd-right-none no-pd">
																			<div class="cc-head">
																				<h5>Phone</h5>
																			</div>
																			<div class="inpt-field">
																				<input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="">
																			</div><!--inpt-field end-->
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="cc-head">
																	<h5>Avatar <i class="fa fa-question-circle"></i></h5>
																</div>
																<div class="custom-file">
																	<input type="file" name="avatar" class="custom-file-input" accept="image/x-png,image/jpg,image/gif,image/jpeg" onchange="loadFile(event)">
																	<label class="custom-file-label" for="customFile">@if(Auth::user()->avatar != "user.png") {{ Auth::user()->avatar }} @else Upload avatar. Max size : 2MB @endif</label>
																</div>
															</div>
															<div class="col-lg-12">
																<button type="submit">Update</button>
															</div>
														</div>
													</form>

												</div>
											</div><!--add-billing-method end-->
										</div><!--product-feed-tab end-->

									</div>

								</div><!--main-ws-sec end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div>
			</div>
		</main>


	</div><!--theme-layout end-->

	<!-- script select option -->

	<script>

		$('#budget_means').change(function(){
			if($('#budget_means').val() == "1"){
				$('#budget_img').attr('src', "{{ asset('frontend/images/btc.png') }}");
			}

			if($('#budget_means').val() == "2"){
				$('#budget_img').attr('src', "{{ asset('frontend/images/eth.png') }}");
			}
		});

		$('#withdraw_means').change(function(){
			if($('#withdraw_means').val() == "1"){
				$('#withdraw_img').attr('src', "{{ asset('frontend/images/btc.png') }}");
			}

			if($('#withdraw_means').val() == "2"){
				$('#withdraw_img').attr('src', "{{ asset('frontend/images/eth.png') }}");
			}

			if($('#withdraw_means').val() == "3"){
				$('#withdraw_img').attr('src', "{{ asset('frontend/images/pm.png') }}");
			}

			if($('#withdraw_means').val() == "4"){
				$('#withdraw_img').attr('src', "{{ asset('frontend/images/mtn.png') }}");
			}

			if($('#withdraw_means').val() == "5"){
				$('#withdraw_img').attr('src', "{{ asset('frontend/images/org.png') }}");
			}
		});

	</script>

	<script>

		function myFunction() {
		/* Get the text field */
		var copyText = document.getElementById("myInput");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /* For mobile devices */

		/* Copy the text inside the text field */
		navigator.clipboard.writeText(copyText.value);

		/* Alert the copied text */
		//alert("Copied the text: " + copyText.value);
		$(".flash").addClass("animate--drop-in-fade-out");
		setTimeout(function () {
			$(".flash").removeClass("animate--drop-in-fade-out");
		}, 3500);
		}

		$(function() {

			$('#ten').show().attr('required', 'required');
			$('#nine').hide().removeAttr('required');
			$('#duration').change(function(){
				if($('#duration').val() == '1') {
					$('#nine').show().attr('required', 'required');
					$('#ten').hide().removeAttr('required');
				} else if($('#duration').val() == '2'){
					$('#nine').hide().removeAttr('required');
					$('#ten').show().attr('required', 'required');
				}
			});
		});

	// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>

<script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>

@endsection

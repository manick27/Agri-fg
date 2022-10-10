@extends('layout')

@section('title')
    Home Page | AGRI FG
@endsection

@section('content')
    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 intro-text">
                            <h1>AGRI FG Services</h1>
                            <p>AGRI FG fait dans l'agriculture depuis plusieurs années déjà et s'engage à fournir des
                                profuits de qualité</p>
                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Plus d'infos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2>Bienvenue sur <span>AGRI FG</span></h2>
                        <hr>
                        <p>Nous sommes un groupe de Technicien d’agriculture tous formés dans les écoles d’agriculture au Cameroun et dans le métier depuis plus de 10 ans.
                        </p>
                        <p>Notre mission est de valoriser et promouvoir les meilleurs techniques agricoles dans le Cameroun
                        </p>
                        <p>Apporter à nos plantations des semences de qualité pour un meilleur rendement.</p>
                        <a href="#services" class="btn btn-custom btn-lg page-scroll">Voir les Services</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="about-media"> <img src="{{ asset('asset/img/2.jpg') }}" alt=" " width="100px">
                    </div>
                    <div class="about-desc">
                        <h3>Nous en image</h3>
                        <p>Pour tous vos soucis agricoles, nous sommes là, nous cherchons à être près de vous et vous accompagner.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="about-media"> <img src="{{ asset('asset/img/3.jpg') }}" alt=" " width="7000">
                    </div>
                    <div class="about-desc">
                        <h3>Notre Logo</h3>
                        <p>Comme notre logo le présente, la nautre au plus vert de sa forme fait partie de notre quotidien, donc le rendement est important.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section -->
    <div id="services">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 section-title text-center">
                <h2>Nos Services</h2>
                <hr>
                <p>Nous exposons au grand public plusieurs plants tels que:</p>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="service-media"> <img src="{{ asset('asset/img/services/service-1.jpg') }}" alt=" ">
                    </div>
                    <div class="service-desc">
                        <h3>Rejetons Plantain</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd
                            commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"> <img src="{{ asset('asset/img/services/service-2.jpg') }}" alt=" ">
                    </div>
                    <div class="service-desc">
                        <h3>Fruits</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd
                            commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"> <img src="{{ asset('asset/img/services/service-3.jpg') }}" alt=" ">
                    </div>
                    <div class="service-desc">
                        <h3>Bouture de manioc</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd
                            commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"> <img src="{{ asset('asset/img/services/service-4.jpg') }}" alt=" ">
                    </div>
                    <div class="service-desc">
                        <h3>Plants de macabo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd
                            commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Section -->
    <div id="portfolio">
        <div class="container">
            <div class="section-title text-center center">
                <h2>Notre Gallerie</h2>
                <hr>
                <p>Quelques images de nos plants</p>
            </div>
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">Tous</a></li>
                            <li><a href="#" data-filter=".lawn">Fruits</a></li>
                            <li><a href="#" data-filter=".garden">Rejettons plantain</a></li>
                            <li><a href="#" data-filter=".planting">Plan de macabo</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="portfolio-items">
                    <div class="col-sm-6 col-md-4 lawn">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/01-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Lorem Ipsum</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/01-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 planting">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/02-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Adipiscing Elit</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/02-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 lawn">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/03-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Lorem Ipsum</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/03-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 lawn">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/04-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Lorem Ipsum</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/04-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 planting">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/05-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Adipiscing Elit</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/05-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 garden">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/06-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Dolor Sit</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/06-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 garden">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/07-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Dolor Sit</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/07-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 lawn">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/08-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Lorem Ipsum</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/08-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 planting">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="{{ asset('asset/img/portfolio/09-large.jpg') }}"
                                    title="Project Title" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>Adipiscing Elit</h4>
                                    </div>
                                    <img src="{{ asset('asset/img/portfolio/09-small.jpg') }}" class="img-responsive"
                                        alt="Project Title">
                                </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Section -->
    {{-- <div id="testimonials" class="text-center">
    <div class="overlay">
      <div class="container">
        <div class="section-title">
          <h2>Commentaires</h2>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div id="testimonial" class="owl-carousel owl-theme">
              <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed
                  commodo nibh ante facilisis bibendum dolor feugiat at duis sed dapibus leo nec ornare diam."</p>
                <p>- John DOE, Parker County, TX</p>
              </div>
              <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed
                  commodo nibh ante facilisis bibendum dolor feugiat at duis sed dapibus leo nec ornare diam."</p>
                <p>- Jenny DOE, Parker County, TX</p>
              </div>
              <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed
                  commodo nibh ante facilisis bibendum dolor feugiat at duis sed dapibus leo nec ornare diam."</p>
                <p>- John DOE, Parker County, TX</p>
              </div>
              <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed
                  commodo nibh ante facilisis bibendum dolor feugiat at duis sed dapibus leo nec ornare diam."</p>
                <p>- John DOE, Parker County, TX</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contactez Nous</h2>
                <hr>
                <p>L'un de nos publication à attirer votre attention? <br> Avez-vous une incomprehension? <br>Contactez-nous
                    maintenant.</p>
            </div>
            <div class="col-md-10 col-md-offset-1 contact-info">
                <div class="col-md-4">
                    <h3>Addresse</h3>
                    <hr>
                    <div class="contact-item">
                        <p>Njombé - Pénja,</p>
                        <p>Cameroun,</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Heure de travail</h3>
                    <hr>
                    <div class="contact-item">
                        <p>Lundi-Dimanche: 07:00 - 18:00</p>
                        <p>Perçoit les messages: 24h/24</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Infos Contact</h3>
                    <hr>
                    <div class="contact-item">
                        <p>Phone 1: +237 675 186 673</p>
                        <p>Phone 2: +237 670 783 947</p>
                        <p>Email: gerardbogning@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <h3>Laissez nous un message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Nom"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="Email"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection

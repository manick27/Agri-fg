@extends('admin.admin-menu-footer')

@section('title')
    Admin Dashboard | CIMIM
@endsection

@section('aside')

<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{ asset('backend/img/ui-sam.jpg') }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a href="{{ Route('admin') }}">
              <i class="fa fa-dashboard"></i>
              <span>Tableau de bord</span>
              </a>
          </li>

          <li>
            <a href="{{ Route('admin.create.product') }}">
              <i class="fa fa-clipboard"></i>
              <span>Ajouter un plant</span>
              </a>
          </li>

          <li>
            <a href="{{ Route('admin.inventory') }}">
              <i class="fa fa-th-large"></i>
              <span>Inventaire</span>
              </a>
          </li>

          <li>
            <a href="{{ Route('admin.invoices') }}">
              <i class="fa fa-barcode"></i>
              <span>Messages</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

@endsection




@section('content')

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      @if (session('message'))
        <div class="alert alert-success"><b>Well done!</b> {{ session('message') }}.</div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger"><b>Danger!</b> {{ session('error') }}.</div>
      @endif
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->

            <!--custom chart end-->
            <div class="row mt">
              <!-- /col-md-4-->
              <div class="col-md-3 col-sm-3 mb">
                <div class="darkblue-panel pn donut-chart">
                  <div class="darkblue-header">
                    <h5>NOMBRE DE PLANTS</h5>
                  </div>
                  <p class="mt" style="color:white;"><b>{{ $products->count() }}</b><br/># PLANTS</p>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-3 col-sm-3 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>NOMBRE DE VENTES</h5>
                  </div>
                  <p class="mt" ><b>{{ $invoices->count() }}</b><br/> Activités</p>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-3 col-sm-3 mb centered">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>REVENU / CHIFFRE D'AFFAIRE</h5>
                  </div>

                  <p class="mt"><b>{{ $amount }} XAF</b><br/>Vente Totale</p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>

          </div>

        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->

@endsection

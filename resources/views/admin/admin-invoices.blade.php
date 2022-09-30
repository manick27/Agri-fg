@extends('admin.admin-menu-footer')

@section('title')
    Admin - Produits | Clinic Computer
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
              <span>Ajouter un produit</span>
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
<section id="main-content">

    <section class="wrapper">

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


     <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                   <h4>{{ $products->count() }}</h4>
                  <h6>Tout de produits</h6>
                </div>
              </div>
            </div>
            <!-- /row -->
        </div>

    <h3><i class="fa fa-angle-right"></i>Liste de toutes les factures</h3>
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i> </h4>
            <hr>
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-bars"></i>No Facture</th>
                    <th><i class="fa fa-bars"></i>Nom Client</th>
                    <th><i class="fa fa-list"></i>Montant</th>
                    <th><i class="fa fa-list"></i>Vendu En ligne / A la boutique</th>
                    <th><i class="fa fa-list"></i>Date</th>
                    <th><i class="fa fa-list"></i>Actions</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($invoices as $invoice)
                    <tr>
                        <td>
                            <a>{{ $invoice->id }}</a>
                        </td>
                        <td>{{ $invoice->invoice_no}}</td>
                        <td>@if($invoice->type == "ADMIN")
                            {{ $invoice->name }}
                            @else
                            {{ $invoice->user->username }}
                            @endif
                        </td>
                        <td>{{ $invoice->amount}}</td>
                        <td>@if($invoice->type == "ADMIN")
                            à la boutique
                            @else
                            en ligne
                            @endif
                        </td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>
                            <a href="/admin/invoice/{{ $invoice->id}}" ><button class="btn btn-success btn-xs">voir details</button></a>
                            <a href="#" title=""><button class="btn btn-primary btn-xs">telecharger</button></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </table>
        </div>
        <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- /row -->
    </section>
</section>
    <!-- /MAIN CONTENT -->
    @endsection

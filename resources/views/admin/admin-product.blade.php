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
                  <h6>Nombre de produits</h6>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <p>
                    <a href="/admin/create/product"><button class="btn btn-theme">Creer un nouveau produit</button></a>
                </p>
              </div>

            </div>
          </div>
      </div>


    <h3><i class="fa fa-angle-right"></i>Liste de tout les produits</h3>
    <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Type/Categorie</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Fournisseur</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                      <tr>
                          <td>
                              <a>{{ $loop->index }}</a>
                          </td>
                          <td>{{ $product->title}}</td>
                          <td>{{ $product->type}}</td>
                          <td>{{ $product->price}}</td>
                          <td>{{ $product->quantity}}</td>
                          <td>
                              <a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                          </td>
                      </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
    </section>
</section>

    <!-- /MAIN CONTENT -->
    @endsection

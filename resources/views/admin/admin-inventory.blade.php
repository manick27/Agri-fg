@extends('admin.admin-menu-footer')

@section('title')
    Admin - Inventory | Clinic Computer
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
              <div class="col-md-4 profile-text mt mb centered">
                <p>
                    <a href="/admin/create/product"><button class="btn btn-theme">Creer un nouveau produit</button></a>
                </p>
              </div>
            </div>
            <!-- /row -->

        </div>

    <h3><i class="fa fa-angle-right"></i>Inventaire de tout les produits</h3>
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
                    <th><i class="fa fa-bars"></i>Nom</th>
                    <th><i class="fa fa-bars"></i>Type/Categorie</th>
                    {{-- <th><i class="fa fa-list"></i>Prix</th>
                    <th><i class="fa fa-list"></i>Quantité</th>
                    <th><i class="fa fa-list"></i>Fournisseur</th> --}}
                    <th><i class="fa fa-list"></i>Actions</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($products as $product)
                    <tr>
                        <td>
                            <a>{{ $product->id }}</a>
                        </td>
                        <td>{{ $product->title}}</td>
                        <td>{{ $product->type}}</td>
                        {{-- <td>{{ $product->price}}</td>
                        <td>{{ $product->quantity}}</td> --}}
                        <td>
                            <a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i> details</button></a>
                            @if(Auth::user()->is_super_admin == 1)
                              <a href="/admin/edit/product/{{ $product->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> modifier</button></a>
                                <div class="modal fade" id="{{ 'mymodaldp' . $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title" id="myModalLabel">Supprimmer ce produit</h4>
                                      </div>
                                      <form method="GET" action="{{ route('admin.product.delete', ['id' => $product->id]) }}">
                                          @csrf
                                          <div class="modal-body">
                                          <p>Voulez vous supprimmer ce produit de la liste des produits ?</p>

                                          </div>

                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-default">Oui</button>
                                          </div>
                                      </form>
                                      </div>
                                  </div>
                                </div>
                                <a href="" data-toggle="modal" data-target="{{ '#mymodaldp' . $product->id }}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i> supprimer</button></a>
                            @endif
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

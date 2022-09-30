@extends('admin.admin-menu-footer')

@section('title')
    Admin - Cart | Clinic Computer
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
    @if($carts->count() > 0)
      <h3><i class="fa fa-angle-right"></i>Panier actuel</h3>
      <!-- row -->
      <div class="row mt">
          <div class="col-md-12">
          <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
              <h4><i class="fa fa-angle-right"></i> Completer le nom du client et valider l'achat </h4>
              <hr>
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Product Name / Description</th>
                      <th>Quantité</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($carts as $cart)
                      <tr>
                          <td>
                              {{ $loop->index }}
                          </td>
                          <td>{{ $cart->product->title . ' / ' . $cart->product->description }}</td>
                          <td>{{ $cart->quantity}}</td>
                          <td>
                              <div class="modal fade" id="{{ 'mymodalc' . $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title" id="myModalLabel">Auccun budget investi</h4>
                                      </div>
                                      <form method="GET" action="{{ route('admin.cart.delete', ['id' => $cart->id]) }}">
                                          @csrf
                                          <div class="modal-body">
                                          <p>Voulez vous supprimmer ce produit du panier ?</p>

                                          </div>

                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-default">Oui</button>
                                          </div>
                                      </form>
                                      </div>
                                  </div>
                                </div>
                                <a href="" data-toggle="modal" data-target="{{ '#mymodalc' . $cart->id }}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                          </td>
                      </tr>
                  @endforeach

              </tbody>
              </table>


          </div>
        <div class="form-panel">
            <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="/admin/create/invoice">
            @csrf
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Nom du client et telephone </label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="name" name="name" type="text"  />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme02" type="submit">Valider l'achat</button>
                        <button class="btn btn-theme04" type="reset">Annuler</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /form-panel -->

          <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
      </div>
    @endif
    <!-- /row -->
        <h3><i class="fa fa-angle-right"></i> Ajoutez les produits au panier</h3>
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
                    <th>Choisi une quantité et ajouter</th>
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
                          <td>@if($product->furnisher != null)
                            {{ $product->furnisher->name}}
                            @else
                              Auccun fournisseur
                            @endif
                          </td>
                          <td>
                            <form method="GET" action="{{ route('admin.add.cart', ['id' => $product->id]) }}">
                                @csrf
                                <input type="number" name="quantity" value="1">
                                <button class="btn btn-success btn-xs" type="submit"><i class="fa fa-plus"></i></button>
                            </form>
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
      <!-- /wrapper -->
    </section>

    <!-- /MAIN CONTENT -->
    @endsection


@extends('admin.admin-menu-footer')

@section('title')
    Admin - Category | Better You Still
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
    <h3><i class="fa fa-angle-right"></i>Creer un nouveau Fournisseur</h3>
    <div class="row mt">
        <div class="col-lg-12">
        <div class="form-panel">
            <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/admin/create/furnisher">
            @csrf
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Nom du fournisseur *</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="name" name="name" type="text"  />
                    </div>
                </div>

                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Type de produit *</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="ccomment" name="product_type"  placeholder="Expl : Laptop, Desktop, Accessoires etc ...."/>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Telephone du fournisseur *</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="name" name="phone" type="text"  />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit">Save</button>
                        <button class="btn btn-theme04" type="reset">Cancel</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>

    <h3><i class="fa fa-angle-right"></i>Liste des fournisseurs</h3>
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
            <hr>
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-user"></i>Name</th>
                    <th><i class="fa fa-list"></i>Type de Procduit</th>
                    <th><i class="fa fa-list"></i>Telephone</th>
                    <th><i class="fa fa-list"></i>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($furnishers as $furnisher)
                    <tr>
                        <td>
                            <a>{{ $furnisher->id }}</a>
                        </td>
                        <td>{{ $furnisher->name}}</td>
                        <td>{{ $furnisher->product_type}}</td>
                        <td>{{ $furnisher->phone}}</td>
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
        <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- /row -->
    </section>
</section>
    <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
        }, 10000);
    </script>

    <!-- /MAIN CONTENT -->
    @endsection

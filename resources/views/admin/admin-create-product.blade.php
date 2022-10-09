@extends('admin.admin-menu-footer')

@section('title')
    Admin - Create - Plant | AGRI FG
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

    <h3><i class="fa fa-angle-right"></i>Creer un nouveau plants</h3>
    <div class="row mt">
        <div class="col-lg-12">
        <div class="form-panel">
            <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="/admin/create/product" enctype="multipart/form-data">
            @csrf
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Selectionner le type / catégories <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="type" required>
                                <option value="1">Pépinières-semencière</option>
                                <option value="2">Bananier-plantain</option>
                                <option value="3">Arbres fruitiers & Agrumes</option>
                                <option value="4">Boutures</option>
                                <option value="5">Graines</option>
                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Nom du plant <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="name" name="title" minlength="2" type="text" required />
                    </div>
                </div>

                {{-- <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Prix unitaire <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="price" type="number" required />
                    </div>
                </div> --}}

                {{-- <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Quantité <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="quantity" type="number" required/>
                    </div>
                </div> --}}

                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="description" rows="4" required></textarea>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Principal Image <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="main_image" required></textarea>
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 1 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image1" ></textarea>
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 2 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image2" ></textarea>
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 3 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image3" ></textarea>
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 4 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image4" ></textarea>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit">Enregistrer</button>
                        <button class="btn btn-theme04" type="reset">Annuler</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>


    </section>
</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

		$('#category').on('change', function() {
          getSubCat();
        });

    });

    function getSubCat() {

	  var selectedCategory = $("#category option:selected").val();

      $.ajax({
        type: "GET",
        data: {
		  'category': selectedCategory,
        },
        url:"/admin/create/post",
        success:function(subCategories) {
          $('#sub-category').html(subCategories);
        }
      });
    }
  </script>



@endsection

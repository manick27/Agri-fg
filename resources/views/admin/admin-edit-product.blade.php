@extends('admin.admin-menu-footer')

@section('title')
    Admin - Edit Product | Clinic Computer
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

    <h3><i class="fa fa-angle-right"></i>Editer un Produit</h3>
    <div class="row mt">
        <div class="col-lg-12">
        <div class="form-panel">
            <div class=" form">
            <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{{ route('admin.product.edit', ['id' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Selectionner le type / categoris <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="type" required>
                                <option value="1" @if($product->type == "LAPTOP") selected @endif>Laptop</option>
                                <option value="2" @if($product->type == "DESKTOP") selected @endif>Desktop</option>
                                <option value="3" @if($product->type == "ACCESSOIRES") selected @endif>Accessoires</option>
                                <!-- <option value="3">Audio</option>    -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cname" class="control-label col-lg-2">Selectionner le fournisseur <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select id="furnisher" name="furnisher" required>
                        <option value="0" @if($product->furnisher_id == null) selected @endif>Auccun Fournisseur</option>
                            @if($product->furnisher_id != null)
                                @foreach ($furnishers as $furnisher)
                                    <option value="{{ $furnisher->id }}" @if($product->furnisher_id == $furnisher->id) selected @endif>{{ $furnisher->name }} / {{ $furnisher->phone }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Nom du produit <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="name" name="title" minlength="2" value="{{ $product->title }}" type="text" required />
                    </div>
                </div>

                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Prix unitaire <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="price" type="number"  value="{{ $product->price }}" required />
                    </div>
                </div>

                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Quantité <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="quantity" type="number"  value="{{ $product->quantity }}" required/>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="description" rows="4" required>{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Principal Image <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="main_image"  value="{{ $product->main_image }}" />
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 1 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image1" value="{{ $product->image1 }}" />
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 2 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image2" value="{{ $product->image2 }}" />
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 3 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image3" value="{{ $product->image3 }}" />
                    </div>
                    <label for="ccomment" class="control-label col-lg-2">Image 4 </label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control " id="ccomment" name="image4" value="{{ $product->image4 }}" />
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-theme" type="submit">Save</button>
                       <a href="{{ Route('admin.inventory') }}" class="btn btn-theme04"> Cancel</a>
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

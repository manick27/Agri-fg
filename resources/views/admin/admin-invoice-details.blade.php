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
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>AGRI FG</h1>
                  <address>
                <strong>Site d'exposition des plants agricole'.</strong><br>
                gerardbogning@gmail.com<br>
                Njobe - Pedja, Cameroun<br>
                <abbr title="Phone">Tel : </abbr> +(237) 675 186 673
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h2>Facture</h2>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h4>Nom Client : @if($invoice->type == "ADMIN")
                            {{ $invoice->name }}
                            @else
                            {{ $invoice->user->username }}
                            @endif</h4>
                    <address>
<!--                   <strong>Enterprise Corp.</strong><br>
                  234 Great Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  <abbr title="Phone">Tel : </abbr> (123) 456-7890-->
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> NO FACTURE : </div>
                      <div class="pull-right"> {{ $invoice->invoice_no }}</div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> DATE DE FACTURE : </div>
                      <div class="pull-right">{{ $invoice->created_at }}</div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="well well-small green">
                      <div class="pull-left"> Montant Total : </div>
                      <div class="pull-right"> {{ $invoice->amount }} XAF</div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">QUANTITE</th>
                      <th class="text-left">DESCRIPTION</th>
                      <th style="width:140px" class="text-right">PRICE UNITAIRE</th>
                      <th style="width:90px" class="text-right">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($invoice->products as $product)
                    <tr>
                      <td class="text-center">{{ $product->pivot->quantity }}</td>
                      <td>{{ $product->title . ' / ' . $product->description }}</td>
                      <td class="text-right">{{ $product->price }}</td>
                      <td class="text-right">{{ $product->pivot->quantity * $product->price }}</td>
                    </tr>
                @endforeach
                    <tr>
                      <td colspan="2" rowspan="4">
                        <h4>Termes et Conditions</h4>
                        <p>Thank you for your business. We do expect payment within 21 days, so please process this invoice within that time. There will be a 1.5% interest charge per month on late invoices.</p>
                        <td class="text-right"><strong>Sous Total</strong></td>
                        <td class="text-right">{{ $invoice->amount }}</td>
                    </tr>
<!--                     <tr>
                      <td class="text-right no-border"><strong>Shipping</strong></td>
                      <td class="text-right">$0.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                      <td class="text-right">$0.00</td>
                    </tr> -->
                    <tr>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Montant Total</strong></div>
                      </td>
                      <td class="text-right"><strong>{{ $invoice->amount }} XAF</strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>

    <!-- /MAIN CONTENT -->
    @endsection

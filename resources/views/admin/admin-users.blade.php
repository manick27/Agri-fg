@extends('admin.admin-menu-footer')

@section('title')
    Admin - User | CIMIM
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
    <h3><i class="fa fa-angle-right"></i> List of all users</h3>
<!-- row -->
    <div class="row mt">
        <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"></i> All Users</h4>
            <hr>
            <thead>
                <tr>
                <th>#</th>
                    <th><i class="fa fa-user"></i> First Name</th>
                    <th><i class="fa fa-user"></i> Last Name</th>
                    <th><i class="fa fa-user"></i> Username</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa fa-clock"></i> Date</th>
                    <th><i class="fa fa-edit"></i>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <td>{{ $loop->index }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                        <!-- {{ route('admin.user.details', ['id' => $user->id]) }} -->
                            <a href="#"><button class="btn btn-success btn-xs">Voir details</button></a>
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

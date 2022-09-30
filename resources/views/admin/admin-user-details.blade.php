@extends('admin.admin-menu-footer')

@section('title')
    Admin - User - Details | CIMIM
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

    <section class="wrapper site-min-height">
      @if (session('message'))
        <div class="alert alert-success"><b>Well done!</b> {{ session('message') }}.</div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger"><b>Danger!</b> {{ session('error') }}.</div>
      @endif

     <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-3 profile-text mt mb">
                <div class="">
                  <div class="row">
                    <div class="col-md-4">
                      <p><img src="{{ asset('avatars/' . $user->avatar ) }}" class="img-circle" width="80"></p>
                    </div>
                    <div class="col-md-8">
                      <h3>{{ $user->name }}</h3>
                      <p>{{ $user->first_name }}</p>
                      <p>{{ $user->last_name }}</p>
                      <p>{{ $user->email }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /col-md-3 -->
              <div class="col-md-3 profile-text mt mb">
                <div class="right-divider hidden-sm hidden-xs">
                    <h5>Solde Disponible : {{ $user->available }} TND</h5>
                    <h5>Nombre d'investissement : {{ $user->budgets()->count() }}</h5>
                    <h5>Nombre de retrait : {{ $user->withdraws()->count() }}</h5>
                </div>

              </div>
              <!-- /col-md-3 -->
              <div class="col-md-3 centered">
                <div >
                <h3>Legende Statut Budget</h3>
                  <p><button class="btn btn-primary btn-xs">&nbsp;</button> : Non Valide
                  <button class="btn btn-secondary btn-xs">&nbsp;</button> : En Attente & Disponible </p>
                  <p><button class="btn btn-warning btn-xs">&nbsp;</button> : En Cours
                  <button class="btn btn-success btn-xs">&nbsp;</button> : Bloqué
                 <button class="btn btn-danger btn-xs">&nbsp;</button> : Annuler</p>
                </div>

              </div>
              <!-- /col-md-3 -->

              <div class="col-md-3 centered">
                <div >
                  <h3>Legende Retrait</h3>
                  <p><button class="btn btn-primary btn-xs">&nbsp;</button> : Attente de retrait</p>
                  <p><button class="btn btn-secondary btn-xs">&nbsp;</button> : Retrait déjà effectué</p>
                </div>

              </div>
              <!-- /col-md-3 -->


              <div class="row">
                <div class="col-sm-12">
                  <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Liste des budgets activés</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Durée</th>
                            <th>Montant</th>
                            <th>Montant + Bonus</th>
                            <th>% Bonus</th>
                            <th>Moyen d'envoi</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th><i class="fa fa-edit"></i>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->budgets->reverse() as $budget)
                            <tr>
                                <td>{{ $budget->duration }}</td>
                                <td>{{ $budget->amount }}</td>
                                <td>
                                  @if($budget->duration == "09 Mois")
                                    {{ $budget->amount + $budget->bloque }}
                                  @elseif($budget->duration == "10 Mois")
                                    {{ $budget->amount + $budget->disponible }}
                                  @endif
                                </td>
                                <td>
                                  @if($budget->duration == "09 Mois")
                                    ##
                                  @elseif($budget->duration == "10 Mois")
                                    {{ $budget->au_travail }}
                                  @endif
                                </td>
                                <td>{{ $budget->transfert_means }}</td>
                                <td>{{ $budget->created_at }}</td>
                                <td>{{ $budget->status }}</td>
                                <td>
                                  @if($budget->status == "En Attente" || $budget->status == "Bloqué")
                                      <div class="modal fade" id="{{ 'mymodaleb' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Annuler la validation</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.cancel.budget', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Etes vous sur de vouloir annuler la validation de ce budget ? </p>

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodaleb' . $budget->id }}"><button class="btn btn-danger btn-xs">X</button></a>
                                    @endif

                                    @if($budget->status == "Non Valide")
                                      <div class="modal fade" id="{{ 'mymodalv' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Valider un budget</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.activate.budget', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Etes vous sur de vouloir valider ce budget ? </p>
                                              <p>Avez vous percu l'argent venant de cet utilisateur ?</p>

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal fade" id="{{ 'mymodals' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Supprimer un budget</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.delete.budget', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Etes vous sur de vouloir supprimer ce budget ? </p>

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodals' . $budget->id }}"><button class="btn btn-danger btn-xs">Supp</button></a>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodalv' . $budget->id }}"><button class="btn btn-primary btn-xs">Valider</button></a>
                                    @endif

                                    @if($budget->status == "En Cours")
                                      <div class="modal fade" id="{{ 'mymodald' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Passer budget à Disponible</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.pass.available', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                                Etes vous sur vouloir passer ce budget à Disponible ?
                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="#" data-toggle="modal" data-target="{{ '#mymodald' . $budget->id }}"><button class="btn btn-warning btn-xs">Passer à disponible</button></a>
                                    @endif

                                    @if($budget->status == "Bloqué")
                                      <div class="modal fade" id="{{ 'mymodalbl' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Ajouter Bénéfice</h4>
                                            </div>
                                            <form method="POST" action="{{ route('admin.add.profit', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Ajouter un bénéfice à cet investissement</p>
                                              <input type="number" min="1" name="profit" placeholder="Somme en UDS($)" required>

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-default">Ajouter</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodalbl' . $budget->id }}"><button class="btn btn-success btn-xs">Ajouter bénéfice</button></a>
                                    @endif

                                    @if($budget->status == "Disponible")
                                      <a href="" ><button class="btn btn-xs">Investissement Terminé</button></a>
                                    @endif

                                    @if($budget->status == "Au Travail")
                                    <div class="modal fade" id="{{ 'mymodalec' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Passer budget au statut En Cours</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.pass.encours', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                                Etes vous sur vouloir passer ce budget à En Cours ?
                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal fade" id="{{ 'mymodalat' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Ajouter un Pourcentage de Bonus</h4>
                                            </div>
                                            <form method="POST" action="{{ route('admin.add.bonus', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Ajouter un Pourcentage de Bonus à cet investissement</p>
                                              <input id="complete" type="checkbox" name="complete" id=""> Cocher si vous voulez completer le pourcentage à 75 %
                                              <input id="bonus" style="width:50%;" type="number" min="0" max="75" name="profit" placeholder="max : 75%" value="0">

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-default">Ajouter</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodalat' . $budget->id }}"><button class="btn btn-success btn-xs">Ajout pourcentage</button></a>
                                      <a href="#" data-toggle="modal" data-target="{{ '#mymodalec' . $budget->id }}"><button class="btn btn-warning btn-xs">Passer à en cours</button></a>
                                    @endif

                                    @if($budget->status == "En Attente")
                                      <a href="" ><button class="btn btn-secondary btn-xs">{{ $budget->status }}</button></a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Liste des retraits</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Moyen de retrait</th>
                            <th>Compte d'envoi</th>
                            <th>Statut</th>
                            <th> Date</th>
                            <th><i class="fa fa-edit"></i>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->withdraws->reverse() as $withdraw)
                            <tr>
                                <td>{{ $withdraw->amount }}</td>
                                <td>{{ $withdraw->transfert_means }}</td>
                                <td>{{ $withdraw->account }}</td>
                                <td>{{ $withdraw->status }}</td>
                                <td>{{ $withdraw->created_at }}</td>
                                <td>
                                  @if($withdraw->status == "Attente de retrait")
                                    <div class="modal fade" id="{{ 'mymodalr' . $withdraw->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Valider retrait</h4>
                                          </div>
                                          <form method="GET" action="{{ route('admin.valid.withdraw', ['id' => $withdraw->id]) }}">
                                            @csrf
                                            <div class="modal-body">
                                              <p>Etes vous sur de vouloir valider ce retrait ?</p>
                                              <p>L'avez vous déjà envoyer la somme réclamé ?</p>

                                            </div>

                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                              <button type="submit" class="btn btn-default">Oui</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal fade" id="{{ 'mymodalrs' . $withdraw->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Supprimer un retrait</h4>
                                          </div>
                                          <form method="GET" action="{{ route('admin.delete.withdraw', ['id' => $withdraw->id]) }}">
                                            @csrf
                                            <div class="modal-body">
                                              <p>Etes vous sur de vouloir supprimer ce retrait ?</p>

                                            </div>

                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                              <button type="submit" class="btn btn-default">Oui</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="{{ '#mymodalrs' . $withdraw->id }}"><button class="btn btn-danger btn-xs">Supp</button></a>
                                    <a href="#" data-toggle="modal" data-target="{{ '#mymodalr' . $withdraw->id }}"><button class="btn btn-primary btn-xs">Valider ce retrait</button></a>
                                  @endif

                                  @if($withdraw->status == "Retrait déjà effectué")
                                    <div class="modal fade" id="{{ 'mymodalav' . $withdraw->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Annuler la validation</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.cancel.withdraw', ['id' => $withdraw->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                              <p>Etes vous sur de vouloir annuler la validation de ce retrait ? </p>

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-default">Oui</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodalav' . $withdraw->id }}"><button class="btn btn-danger btn-xs">X</button></a>
                                    <a href="" ><button class="btn btn-secondary btn-xs">Retrait déjà effectué</button></a>
                                  @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Liste des produits / bonus</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Durée</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th><i class="fa fa-edit"></i>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->budgets->reverse() as $budget)
                          @if($budget->duration == "09 Mois")
                            <tr>
                                <td>{{ $budget->amount }}</td>
                                <td>{{ $budget->duration }}</td>
                                <td>{{ $budget->created_at }}</td>
                                <td>
                                  @if($budget->en_cours == 1 || $budget->en_cours == 3)
                                    Bonus Produit
                                  @elseif($budget->en_cours == 2 || $budget->en_cours == 4)
                                    Bonus argent
                                  @else
                                    En attente
                                  @endif

                                </td>
                                <td>
                                  @if($budget->en_cours == 1)
                                    <div class="modal fade" id="{{ 'mymodalbp' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Remettre un produit</h4>
                                          </div>
                                          <form method="GET" action="{{ route('admin.budget.product', ['id' => $budget->id]) }}">
                                            @csrf
                                            <div class="modal-body">
                                              <input type="text" name="product" placeholder="Nom du produit" >
                                              <input type="text" name="place" placeholder="Lieu de decharge" >

                                            </div>

                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                              <button type="submit" class="btn btn-default">Valider</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="{{ '#mymodalbp' . $budget->id }}"><button class="btn btn-primary btn-xs">Remettre un Produit</button></a>
                                  @endif

                                  @if($budget->en_cours == 2)
                                    <div class="modal fade" id="{{ 'mymodalbm' . $budget->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Remettre l'argent</h4>
                                            </div>
                                            <form method="GET" action="{{ route('admin.budget.money', ['id' => $budget->id]) }}">
                                              @csrf
                                              <div class="modal-body">
                                                <p>Entrer le montant equivalent a la somme investi </p>
                                                <input type="number" min="0" name="bonus"  >

                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-default">Remettre l'argent</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <a href="" data-toggle="modal" data-target="{{ '#mymodalbm' . $budget->id }}"><button class="btn btn-success btn-xs">Remettre l'argent</button></a>

                                  @endif

                                  @if($budget->en_cours == 3 || $budget->en_cours == 4 )
                                    <a href="" ><button class="btn btn-secondary btn-xs">Bonus déjà rémis</button></a>
                                  @endif

                                  @if($budget->en_cours == 0)
                                    <a href="" ><button class="btn btn-warning btn-xs">En attente</button></a>
                                  @endif
                                </td>
                            </tr>
                          @endif
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- /row -->
        </div>

    </section>
</section>

    <!-- /MAIN CONTENT -->
    @endsection

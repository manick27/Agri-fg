<div>
    <div class="post-bar col-lg-12">
        <div class="post_topbar">
            <ul class="savedjob-info mangebid manbids">
                <li>
                    <h3>Durée</h3>
                    <p>{{ $budget->duration }}</p>
                </li>
                <li>
                    <h3>Montant (TND)</h3>
                    <p>{{ $budget->amount }}</p>
                </li>
                <li>
                <li>
                    <h3>Montant + Bonus (TND)</h3>
                    @if($budget->duration == "09 Mois")
                        <p>{{ $budget->amount + $budget->bloque }}</p>
                    @elseif($budget->duration == "10 Mois") 
                        <p>{{ $budget->amount + $budget->disponible }}</p>	 
                    @endif
                </li>
                <li>
                    <h3>% Bonus</h3>
                    @if($budget->duration == "09 Mois")
                        <p>##</p>
                    @elseif($budget->duration == "10 Mois") 
                        <p>{{ $budget->au_travail }}</p>	 
                    @endif
                </li>
                <li>
                    <h3>Temps restant</h3>
                    <div>
                        <p wire:poll.60000ms="countDown">{{ $budget->days }}:jours {{ $budget->hours }}:heurs {{ $budget->minutes }}:minutes</p>
                    </div>
                    
                </li>

                @if($budget->status == "Bloqué" && $budget->duration == "09 Mois")
                    <li>
                        <h3>Produit / Bonus</h3>
                        @if($budget->en_cours == 1)
                        <p style="color: blue;">Vous reclamez un produit</p>
                        @elseif($budget->en_cours == 2)
                        <p style="color: blue">Vous reclamez de l'argent</p>
                        @elseif($budget->en_cours == 3 )
                        <p style="color: green">Votre produit a été délivré !</p>
                        @elseif($budget->en_cours == 4 )
                        <p style="color: green">Votre bonus argent a été délivré !</p>
                        @else
                        <a href="" title="" class="flww" data-toggle="modal" data-target="{{ '#mymodal_' . $budget->id }}" data-whatever="@mdo">Reclamer</a>	
                        @endif													
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div>
    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif

    <div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span>{{ Cart::getTotalQuantity()}} Products</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>No.</th>
								<th>Produit</th>
								<th>Quantité</th>
								<th>Nom Produit</th>
								<th>Prix</th>
								<th>Retirer</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($cartItems as $item)
							<tr class="rem1">
								<td class="invert">{{ $loop->index + 1 }}</td>
								<td class="invert-image">
									<a href="#">
										<img style="height:70px; width:100px;"  src="{{ asset('images/' . $item['attributes']['image']) }}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
                      <a href="#" wire:click.prevent="subQuantity('{{$item['id']}}')"><div class="entry value-minus">&nbsp;</div></a> 
											<div class="entry value">
												<span>{{ $item['quantity'] }}</span>
											</div>
											<a href="#" wire:click.prevent="addQuantity('{{$item['id']}}')"><div class="entry value-plus active">&nbsp;</div></a> 
										</div>
									</div>
								</td>
								<td class="invert">{{ $item['name'] }}</td>
								<td class="invert">{{ $item['price'] }} FCFA</td>
								<td class="invert">
									<div class="rem">
                                    <a href="#" wire:click.prevent="removeCart('{{$item['id']}}')"><div class="close1"> </div></a>  
									</div>
								</td>
							</tr>
            @endforeach   
						</tbody>
					</table>
				</div>
			</div>

      <br>

      <h4 class="mb-sm-4 mb-3">Prix Total :
					<span>${{ Cart::getTotal() }} FCFA</span>
			</h4>

      <div class="checkout-right-basket">
        <a href="#" wire:click.prevent="clearAllCart">Vider le Panier
          <span class="far fa-trash"></span>
        </a>
      </div>
</div>

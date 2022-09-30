<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset('asset/img/cart/cart-1.jpg') }}" alt="">
                                    <h5>{{ $p->title }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ $p->price }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    {{ $p->quantity }}
                                </td>
                                <td class="shoping__cart__total">
                                    {{ $p->description }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-10 mx-auto">
                <div class="mx-auto" style="width: fit-content; text-align: center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

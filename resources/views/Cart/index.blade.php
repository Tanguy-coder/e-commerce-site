@extends('layouts.master')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- slider Area Start-->
<div class="slider-area ">
  <!-- Mobile Menu -->
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('img/hero/category.jpg')}}">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="hero-cap text-center">
                      <h2>Contenu du Panier</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- slider Area End-->

<!--================Cart Area =================-->
@if (Cart::count() > 0)
<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>

              @foreach (Cart::content() as $product)
              <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img src="{{ asset('storage/'.$product->model->image) }}" alt="" />
                      </div>
                      <div class="media-body">
                        <p> {{$product->model->title}} </p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5> {{$product->model->getPrice()}} </h5>
                  </td>
                  <td class="border-0 align-middle">
                    <select class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </td>
                  <td class="border-0 align-middle">
                    <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </form>
                </td>
                </tr>
              @endforeach

              <tr class="bottom_button">
                <td>
                  <a class="btn_1" id="tanguy" href="">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Sous Total :</h5>
                </td>
                <td>
                  <h5>{{getPrice(Cart::subtotal())}}</h5>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>taxes :</h5>
                </td>
                <td>
                  <h5>{{getPrice(Cart::tax())}}</h5>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Total :</h5>
                </td>
                <td>
                  <h5>{{getPrice(Cart::total())}}</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('products.index')}}">Continue Shopping</a>
          </div>
          <div class="checkout_btn_inner float-left">
            <a class="btn_1 checkout_btn_1" href="{{route('checkout.index')}}">Procéder Au Paiement</a>
          </div>
        </div>
      </div>
  </section>
@else
<div class="col-md-12">
    <h5>Votre panier est vide pour le moment.</h5>
    <p>Mais vous pouvez visiter la <a href="{{ route('products.index') }}" >boutique</a> pour faire votre shopping.
    </p>
</div>
@endif
<!--================End Cart Area =================-->
@endsection


@section('extra-js')

<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/panier/${rowId}`,
            {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'PATCH',
                body: JSON.stringify({
                    qty: this.value
                })
        }).then((data) => {
            console.log(data);
            location.reload();
        }).catch((error) => {
            console.log(error);
        });

        });
    });
</script>

@endsection

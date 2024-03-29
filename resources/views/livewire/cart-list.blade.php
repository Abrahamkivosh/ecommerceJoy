<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        @if ($message = Session::get('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong> {{ $message }} </strong>
          </div>
          @endif

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      
                      <img src="/storage/products/{{ $item['attributes']['image'] }}" width="200" height="100" alt="{{ $item['name'] }}" />
                    </div>
                    <div class="media-body">
                      <p>{{ $item['name'] }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5> Ksh {{ $item['price'] }}</h5>
                </td>
                <td>
                  <div class="product_count">

                    @livewire('cart-update', ['item' => $item], key($item['id']))
                  </div>
                </td>
                <td>
                  <h5>{{ $item['price'] *  $item['quantity']  }}</h5>
                </td>
              </tr>
              @endforeach
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" wire:click="clearAllCart"  href="#">Empty Cart</a>

                </td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>Ksh {{ Cart::getTotal() }}</h5>
                </td>
              </tr>
              {{-- <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        <a href="#">Flat Rate: $5.00</a>
                      </li>
                      <li>
                        <a href="#">Free Shipping</a>
                      </li>
                      <li>
                        <a href="#">Flat Rate: $10.00</a>
                      </li>
                      <li class="active">
                        <a href="#">Local Delivery: $2.00</a>
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr> --}}
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{ route('client.categories') }}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="{{ route('client.checkout') }}">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>

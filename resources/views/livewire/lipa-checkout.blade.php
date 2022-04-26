<div class="billing_details">
    <div class="row">
      <div class="col-lg-8">
        <h3>Billing Details and Shipping Details</h3>
        <form class="row contact_form" id="bilingForm" action="#" method="post" novalidate="novalidate">

          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="nameBIlling" name="name" />
            <span class="placeholder"  data-placeholder="full name"></span>
          </div>


          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" wire:model="phone" id="phone" name="phone" />
            <span class="placeholder" data-placeholder="Phone number"></span>
          </div>



          <div class="col-md-12 form-group p_star">
            <input type="text" class="form-control" wire:model="shipping_address" id="shipping_address" name="shipping_address" />
            <span class="placeholder" data-placeholder="shipping address"></span>
          </div>


        </form>
      </div>
      <div class="col-lg-4">
        <div class="order_box">
          <h2>Your Order</h2>
          <ul class="list">
            <li>
              <a href="#">Product
                <span>Total</span>
              </a>
            </li>
            @foreach (Cart::getContent()->toArray()  as $item)
            <li>
                <a href="#">{{ $item['name'] }}
                  <span class="middle">x {{ $item['quantity'] }}</span>
                  <span class="last">{{ $item['price'] }}</span>
                </a>
              </li>

            @endforeach


          </ul>
          <ul class="list list_2">
            <li>
              <a href="#">Subtotal
                <span>Ksh {{ Cart::getTotal() }}</span>
              </a>
            </li>
            <li>
              <a href="#">Shipping
                <span>Flat rate: 0.00</span>
              </a>
            </li>
            <li>
              <a href="#">Total
                <span>Ksh {{ Cart::getTotal() }}</span>
              </a>
            </li>
          </ul>
          <div class="payment_item">
            <div class="radion_btn">
              <input type="radio" id="f-option6" checked name="selector" />
              <label for="f-option5">Mpesa payments</label>
              <img src="/client/img/product/single-product/card.jpg" alt="" />
              <div class="check"></div>
            </div>
            <p>
              We will use Your Profile Phone number for Payment.
            </p>
          </div>


          <div class="creat_account">
            <input type="checkbox" id="f-option4" name="selector" />
            <label for="f-option4">I’ve read and accept the </label>
            <a href="#">terms & conditions*</a>
          </div>
          <button class="btn_3" id="proceedToMpesa1" wire:click="Lipa" >Proceed to Mpesa  </button>
          <div wire:loading>
              <div class="text text-success">
                   Processing Payment...
              </div>

        </div>
        </div>
      </div>
    </div>
  </div>

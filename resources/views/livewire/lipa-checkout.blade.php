<div class="billing_details">
    <div class="row">
        <div class="col-lg-8">
            <h3>Billing Details and Shipping Details</h3>
            <form class="row billing-form" id="bilingForm" action="#" method="post">

                <div class="col-md-6 form-group p_star">
                    <label for="nameBIlling">Full Name <span class="text text-danger pl-0 h2">*</span></label>
                    <input type="text" 
                    class="form-control @error('name') is-invalid @enderror"
                        placeholder="Your Name" value="{{ old('name') }}"
                        wire:model="name"
                         id="nameBIlling" name="name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-6 form-group p_star">
                    <label for="phone">Phone Number <span class="text text-danger pl-0 h2">*</span></label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Phone Number" value="{{ old('phone') }}" wire:model="phone" id="phone"
                        name="phone" />

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="col-md-12 form-group p_star">
                    <label for="shipping_address">Shipping address
                        <span class="text text-danger pl-0 h2">*</span>
                    </label>
                    <input type="text" placeholder="Shipping Address " value="{{ old('shipping_address') }}"
                        class="form-control @error('shipping_address') is-invalid @enderror"
                        wire:model="shipping_address" id="shipping_address" name="shipping_address" />

                    @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{--  success message here  --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif


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
                    @foreach (Cart::getContent()->toArray() as $item)
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
                        We will {{ __('use') }} Your Profile Phone number for Payment.
                    </p>
                </div>


                <div class="creat_account">
                    <input type="checkbox" id="f-option4" name="selector" />
                    <label for="f-option4">I’ve read and accept the </label>
                    <a href="#">terms & conditions*</a>
                </div>
                <button class="btn_3" id="proceedToMpesa1" wire:click="Lipa">Make Payment </button>
                <div wire:loading>
                    <div class="text text-success">
                        Processing Payment...
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

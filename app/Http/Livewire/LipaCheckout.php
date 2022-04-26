<?php

namespace App\Http\Livewire;

use App\Http\Payment\Money;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LipaCheckout extends Component
{
    public $shipping_address ;
    public $phone ;
    public $cartItems = [];
    public function mount(){
        $this->cartItems = \Cart::getContent()->toArray();
    }

    public function Lipa(){


        if ( ! Auth::check() ) {

            Session::flash("error","Please Login or create new account") ;
            return  ;
        }


        $mpesa = new Money();


        try {
            $amount  = \Cart::getTotal() ;
            $mpesa =  $mpesa->lipaNaMPesaOnlineAPI($this->phone , $amount ) ;

            $user = Auth::user() ;


         $order =  $user->orders()->create([
             'amount' => $amount ,
             'shipping_address' => $this->shipping_address  ,
             'order_phone' => $this->phone ,
             'status'=>"pending" ,
             'delivery_date'=> Carbon::now()->addDays(20)
         ]) ;

        foreach ($this->cartItems as $key => $item) {

            $order->order_details()->create(
                [
                    'product_id'=> $item['id'],
                    'quantity' => $item['quantity'],
                    'sub_total' => $item['quantity'] *  $item['price']
                ]
            ) ;
        }


            Session::flash("success",$mpesa ['CustomerMessage'] ) ;
        } catch (\Throwable $th) {
            Session::flash("error",$th->getMessage()) ;
        }


    }

    public function render()
    {
        return view('livewire.lipa-checkout');
    }
}

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
    public $name ;
    public $cartItems = [];
    public function mount(){
        $this->cartItems = \Cart::getContent()->toArray();
    }

    protected $rules = [
        'name' => 'required|string|min:3',
        'shipping_address' => 'required|string|min:2|max:255',
        'phone' => 'required|string|min:10|max:10|regex:/^[0-9]+$/',
        'cartItems' => 'required|array|min:1',
    ];

    public function Lipa(){
        $this->validate();


        if ( !Auth::check() ) {

            session()->flash("error","Please Login or create new account") ;
            return redirect()->to('/client/checkout');
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

        session()->flash("success","Order Placed Successfully") ;
        // session()->flash("success",$mpesa ['CustomerMessage'] ) ;
        } catch (\Throwable $th) {
            session()->flash("error",$th->getMessage()) ;
        }

        return redirect()->to('/client/checkout');
        


    }

    public function render()
    {
        return view('livewire.lipa-checkout');
    }
}

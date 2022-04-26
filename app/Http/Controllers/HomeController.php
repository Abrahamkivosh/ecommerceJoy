<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviewsCount=Review::count();
        $ordersCount=Order::count();
        $usersCount=User::count();
        $products = Product::latest()->paginate(5);
        $orders = Order::latest()->paginate(7);
        $productsCount=Product::count();
        return view('admin.home',\compact('products','orders','ordersCount','usersCount','productsCount','reviewsCount'));
    }

    public function users(){
        $users=User::all();

        return view('admin.users.index',compact('users'));
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }
    public function update(UserUpdateRequest $request,$id){


        $data = $request->validated();

        if (file_exists($request->file('image'))) {
            // dd($request);
             // Get filename with extension
             $filenameWithExt = $request->file('image')->getClientOriginalName();



             // Get extension
             $extension = $request->file('image')->getClientOriginalExtension();

             // Create new filename
             $filenameToStore = (string) Str::uuid() . '_' . time() . '.' . $extension;

             // Uplaod image

             $path = $request->file('image')->storeAs('public/user', $filenameToStore);
             $avatar  = $filenameToStore;
            }
        $user = User::find($id) ;

        if (! Hash::check($data["old_password"], $user->password) ) {
            return back()->withInput(["name","email","is_admin"])->with("error","Incorrect Old Password!") ;
        }

        if ( isset($data["password"])) {
            $data["password"] =   Hash::make( $data["password"]);
            $user->password =  $data["password"];
        }
            $user->name = $data["name"] ;
            $user->email = $data["email"] ;
            $user->is_admin=$data["is_admin"];
            $user->image=$avatar;

            if($user->save()){

            return back()->with("success","User profile updated");
            }
        }

    public function destroy($id){

            $user=User::where('id',$id);

            $user->delete();

            if ($user) {
                return redirect()->route('user.index')->with('success','You have successully deleted this user');
            } else {
                return back()->with('error','An error occured, please contact the administrator');
            }




    }
}

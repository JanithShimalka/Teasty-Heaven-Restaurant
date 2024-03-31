<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Cart;
use App\Models\Order;
use App\Models\reservation;

class HomeController extends Controller
{
    public function redirecta(){
        $breakfast = Menu::where('type','breakfast')->get();
        $lanch = Menu::where('type','lanch')->get();
        $dinner = Menu::where('type','dinner')->get();
        $rev = Review::all();

        if(Auth::id()){
            if(Auth::user()->usertype == '1'){
                return view('admin.home');
            }
            else{
                return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner, 'rev'=>$rev]);
            }

        }else{
            return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner, 'rev'=>$rev]);
        }
    }

    public function index(){
        $breakfast = Menu::where('type','breakfast')->get();
        $lanch = Menu::where('type','lanch')->get();
        $dinner = Menu::where('type','dinner')->get();
        $rev = Review::all();

        return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner, 'rev'=>$rev]);
    }

    public function about(){
        return view('general.about');
    }

    public function review(Request $request){
        $data = new Review;
        $data -> name = $request -> name;
        $data -> email = $request -> email; 
        $data -> message = $request -> message;
        $data -> user_id = Auth::user()->id;

        $data->save();
        return redirect()->back();
    }

    public function services(){
        return view('general.services');
    }
    public function menu(){
        $breakfast = Menu::where('type','breakfast')->get();
        $lanch = Menu::where('type','lanch')->get();
        $dinner = Menu::where('type','dinner')->get();

        return view('general.menu',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner]);
    }
    public function reservation(){
        return view('general.reservation');
    }
    public function team(){
        return view('general.team');
    }
    public function testimonial(){
        $rev = Review::all();
        return view('general.testimonial',['rev'=>$rev]);
    }
    public function contact(){
        return view('general.contact');
    }
    public function myres(){
        $user_id = Auth::user()->id;
        $res = reservation::where('user_id',$user_id)->get();
        return view('general.myres',['res' => $res]);
    }

    public function cart(){
        $user_id = Auth::user()->id;
        $crt = Cart::where('user_id',$user_id)->get();
        return view('general.mycrt',['crt' => $crt]);
    }

    public function delres($id){
        $data = reservation::find($id);
        $data ->delete();

        return redirect()->back()-> with('message','Reservation Request Successfully Deleted.');
    }

    public function delcrt($id){
        $data = Cart::find($id);
        $data ->delete();

        return redirect()->back()-> with('message','Item Successfully Deleted.');
    }

    public function booktable(Request $request){
        $data = new reservation;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> date = $request -> datetime;
        $data -> nop = $request -> select1;
        $data -> spr = $request -> message;
        $data -> status = 'In pogress';
        $data -> user_id = Auth::user()->id;

        $data->save();
        return redirect()->back()-> with('message','Reservation Request Successful. We will contact you soon');
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $menu = Menu::find($id);
            $cart = new Cart;

            $cart -> name =$user->name;
            $cart -> phone =$user->phone;
            $cart -> address =$user->address;
            $cart -> product =$menu->name;
            $cart -> unit_price =$menu->price;
            
            if($request->qty == null){
                $cart -> price =$menu->price;
                $cart -> qty ="1";
            }else{
                $cart -> qty =$request->qty;
                $cart -> price =$menu->price * $request->qty;

            }
            
            $cart -> product_id =$menu->id;
            $cart -> user_id =$user->id;

            $cart->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }

    }
    public function proceed(){
        $user = Auth::user();
        $user_id =$user->id;

        $data = Cart::where('user_id',$user_id)->get();
        foreach($data as $d){
            $order = new Order;

            $order -> name =$d->name;
            $order -> phone =$d->phone;
            $order -> address =$d->address;
            $order -> product =$d->name;
            $order -> unit_price =$d->price;
            $order -> qty =$d->qty;
            $order -> price =$d->price;
            $order -> product_id =$d->product_id;
            $order -> user_id =$d->user_id;
            $order -> status ="In Progress";
            $order -> save();

            $cart_id = $d->id;
            $cartt = Cart::find($cart_id);
            $cartt -> delete();


        }

        return redirect()->back()-> with('message','We have Received your Order. We will contact you soon');;

        
    }

    public function proceedAdmin(){
        $user = Auth::user();
        $user_id =$user->id;

        $data = Cart::where('user_id',$user_id)->get();
        foreach($data as $d){
            $order = new Order;

            $order -> name =$d->name;
            $order -> phone =$d->phone;
            $order -> address =$d->address;
            $order -> product =$d->name;
            $order -> unit_price =$d->price;
            $order -> qty =$d->qty;
            $order -> price =$d->price;
            $order -> product_id =$d->product_id;
            $order -> user_id =$d->user_id;
            $order -> status ="Proceed by Admin";
            $order -> save();

            $cart_id = $d->id;
            $cartt = Cart::find($cart_id);
            $cartt -> delete();


        }

        return redirect()->back()-> with('message','Done');

        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;
use App\Models\reservation;

class HomeController extends Controller
{
    public function redirecta(){
        $breakfast = Menu::where('type','breakfast')->get();
        $lanch = Menu::where('type','lanch')->get();
        $dinner = Menu::where('type','dinner')->get();

        if(Auth::id()){
            if(Auth::user()->usertype == '1'){
                return view('admin.home');
            }
            else{
                return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner]);
            }

        }else{
            return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner]);;
        }
    }

    public function index(){
        $breakfast = Menu::where('type','breakfast')->get();
        $lanch = Menu::where('type','lanch')->get();
        $dinner = Menu::where('type','dinner')->get();

        return view('user.home',['breakfast' => $breakfast, 'lanch' => $lanch, 'dinner'=> $dinner]);
    }

    public function about(){
        return view('general.about');
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
        return view('general.testimonial');
    }
    public function contact(){
        return view('general.contact');
    }
    public function myres(){
        $user_id = Auth::user()->id;
        $res = reservation::where('user_id',$user_id)->get();
        return view('general.myres',['res' => $res]);
    }

    public function delres($id){
        $data = reservation::find($id);
        $data ->delete();

        return redirect()->back()-> with('message','Reservation Request Successfully Deleted.');
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
}

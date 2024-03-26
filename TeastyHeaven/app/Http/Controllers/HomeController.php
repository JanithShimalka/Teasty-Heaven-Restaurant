<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirecta(){
        if(Auth::id()){
            if(Auth::user()->usertype == '1'){
                return view('admin.home');
            }
            else{
                return view('user.home');
            }

        }else{
            return redirect()->back();
        }
    }

    public function index(){

        return view('user.home');
    }

    public function about(){
        return view('general.about');
    }
    public function services(){
        return view('general.services');
    }
    public function menu(){
        return view('general.menu');
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
}

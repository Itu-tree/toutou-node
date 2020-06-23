<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\PlayerTransform;


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
        $user = Auth::user();
        return view('home',['user'=>$user]);
    }

    public function showTransform()
    {   
        $user = Auth::user();
        return view('player_transform',['user'=>$user,'player_transforms'=>$user->playerTransforms]);
    }

    public function deleteTransform()
    {
        $user = Auth::user();
        PlayerTransform::destroy($user->playerTransforms->pluck('id'));
        $data = array();
        foreach($user->playerTransforms as $pt){
           $data = $data + json_decode($pt->transform);
          //  dd(json_decode($pt->transform));
        } 
        return view('player_transform',['user'=>$user,'player_transforms'=>$user->playerTransforms]);
    }
}

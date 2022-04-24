<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        # code...
        return view('client.welcome') ;
    }
    public function categories()
    {
        # code...
        return view('client.Categories') ;
    }
    public function cart()
    {
        # code...
        return view('client.cart') ;
    }
}

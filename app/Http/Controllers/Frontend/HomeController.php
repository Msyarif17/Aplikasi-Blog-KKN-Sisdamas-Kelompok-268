<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Home';
        $content = 'This is the content of the home page';
        return view('frontend.index',compact('title','content'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ScheduleController;
use App\Http\Controllers\Frontend\FaqController;

class HomeController extends Controller


{
    public function index(){
        $title = 'Home';
        $content = 'This is the content of the home page';
        return view('frontend.index',compact('title','content'));
    }

    public function base()
    {
        $blogController = new BlogController();
        $scheduleController = new ScheduleController();
        $faqController = new FaqController();
        $schedules = $scheduleController->index();
        $blogs = $blogController->index();
        $faq = $faqController->index();
        return view('frontend.home', ["blogs"=>$blogs, "schedules" => $schedules, "faq" => $faq]);
    }
}

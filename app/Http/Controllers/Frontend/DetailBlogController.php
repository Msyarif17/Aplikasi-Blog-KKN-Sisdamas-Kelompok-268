<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class DetailBlogController extends Controller
{
    public function index($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog){
            return view('frontend.detail-blog', ["blog" => $blog]);
        }else{
            return redirect()->back();
        }
    }
}

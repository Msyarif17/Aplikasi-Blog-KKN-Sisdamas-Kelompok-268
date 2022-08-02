<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class FaqController extends Controller
{
    public function index()
    {
        $json = Storage::disk('local')->get('faq.json');
        $faq = json_decode($json, true);
        return $faq['faq'];
    }
}

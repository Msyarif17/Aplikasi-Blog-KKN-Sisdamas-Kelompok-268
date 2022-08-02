<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ScheduleController extends Controller
{
    public function index()
    {
        $json = Storage::disk('local')->get('schedule.json');
        return json_decode($json, true);
    }
}

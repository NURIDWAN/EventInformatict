<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Timeline;
use App\Models\Settingweb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcementfrontend;

class FrontendController extends Controller
{
    public function index(){
        $timeline = Timeline::latest()->get();
        $setting = Settingweb::find(1);
        $count_down = Carbon::createFromFormat('Y-j-n', $setting->count_down)->format('n/j/Y');

        $notif = Announcementfrontend::latest()->get();
        return view('layouts.frontend', compact('notif', 'setting', 'timeline', 'count_down'));
    }
}
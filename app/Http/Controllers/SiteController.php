<?php

namespace App\Http\Controllers;

use App\Models\Admin\Track;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $track = Track::all();
        return view('site.home', compact('track'));
    }

}

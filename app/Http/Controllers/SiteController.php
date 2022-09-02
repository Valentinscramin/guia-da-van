<?php

namespace App\Http\Controllers;

use App\Models\Admin\Track;
use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();
        
        return view('site.home', compact('track', 'cities', 'states'));
    }

    public function busca(Request $request)
    {
        $vans = "";
        return view('site.resultado', compact('vans'));
    }

}

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
        //dump($request->cidade_chegada_escola);
        
        switch ($request->track) {
            case 1:
                $request->cidade_saida_escola;
                $request->cidade_chegada_escola;
                $request->escola;
                $request->periodo;
            break;

            case 2:
                $request->cidade_saida_evento;
                $request->evento;
            break;
            
            case 3:
                $request->cidade_saida_executivo;
            break;

            case 4:
                $request->cidade_saida_frete;
            break;
        }
        
        return view('site.resultado', compact('vans'));
    }

}

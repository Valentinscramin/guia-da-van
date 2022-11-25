<?php

namespace App\Http\Controllers;

use App\Models\Admin\Announcement;
use App\Models\Admin\Track;
use App\Models\Cities;
use App\Models\Faq;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();
        $faq = Faq::where('active', '1')->get();
        $announcement = Announcement::where('active', '=', '1')
            ->where('site_web_route', '=', '/home')
            ->get();

        return view('site.home', compact('track', 'cities', 'states', 'announcement', 'faq'));
    }

    public function busca(Request $request)
    {
        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();

        $vans = [];
        switch ($request->track) {
            case 1:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('cities', 'van_track_info.cidade_chegada', '=', 'cities.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->where('van_track.track_id', '=', 1)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_escola)
                    ->where('van_track_info.cidade_chegada', '=', $request->cidade_chegada_escola)
                    ->where('van_track_info.escola', 'LIKE', '%' . $request->escola . '%')
                    ->where('van_track_info.periodo', '=', $request->periodo)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo')
                    ->get();

                break;

            case 2:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->where('van_track.track_id', '=', 2)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_evento)
                    ->where('van_track_info.evento', 'LIKE', '%' . $request->evento . '%')
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo')
                    ->get();

                break;

            case 3:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->where('van_track.track_id', '=', 3)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_executivo)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo')
                    ->get();
                break;

            case 4:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->where('van_track.track_id', '=', 4)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_frete)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo')
                    ->get();
                break;
        }

        return view('site.resultado', compact('vans', 'track', 'states'));
    }

    public function busca_index()
    {
        $track = Track::all();
        $states = States::orderBy('name')->get();

        $vans = DB::table('van_track')
            ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
            ->join('van', 'van_track.van_id', '=', 'van.id')
            ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
            ->join('users', 'van.user_id', '=', 'users.id')
            ->join('track', 'van_track.track_id', '=', 'track.id')
            ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo')
            ->get();

        return view('site.resultado', compact('vans', 'track', 'states'));
    }

    public function quemsomos()
    {
        return view('site.quemsomos');
    }

    public function anuncie()
    {
        return view('site.anuncie');
    }

    public function faq()
    {
        $faq = Faq::where('active', '1')->paginate(25);
        return view('site.faq', compact('faq'));
    }

    public function contato()
    {
        return view('site.contato');
    }
}

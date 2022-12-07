<?php

namespace App\Http\Controllers;

use App\Models\Admin\Announcement;
use App\Models\Admin\Track;
use App\Models\Cities;
use App\Models\Faq;
use App\Models\States;
use App\Models\User\Comment;
use App\Models\User\WebSiteComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\SiteAcessos;

class SiteController extends Controller
{
    public function index()
    {
        $siteacessos = new SiteAcessos();
        $siteacessos->save();

        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();
        $faq = Faq::where('active', '1')->get();
        $websitecomments = WebSiteComment::where('active', '=', '1')->get();
        $announcement = Announcement::where('active', '=', '1')
            ->where('site_web_route', '=', '/home')
            ->get();

        $citiesOne = null;
        $citiesTwo = null;

        return view('site.home', compact('track', 'cities', 'states', 'announcement', 'faq', 'websitecomments', 'citiesOne', 'citiesTwo'));
    }

    public function busca(Request $request)
    {
        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();

        $citiesOne = null;
        $citiesTwo = null;

        $vans = [];
        switch ($request->track) {
            case 1:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c_saida', 'van_track_info.cidade_saida', '=', 'c_saida.id')
                    ->join('cities as c_chegada', 'van_track_info.cidade_chegada', '=', 'c_chegada.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->join('van_user_photo', 'van_user_photo.van_id', '=', 'van.id')
                    ->join('user_photos', 'user_photos.id', '=', 'van_user_photo.user_photo_id')
                    ->where('van_track.track_id', '=', 1)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_escola)
                    ->where('van_track_info.cidade_chegada', '=', $request->cidade_chegada_escola)
                    ->where('van_track_info.escola', 'LIKE', '%' . $request->escola . '%')
                    ->where('van_track_info.periodo', '=', $request->periodo)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo', 'user_photos.arquivo as van_photo')
                    ->get();

                $citiesOne = Cities::where('state_id', '=', $request->estado_saida_escola)->get();
                $citiesTwo = Cities::where('state_id', '=', $request->estado_chegada_escola)->get();

                break;

            case 2:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->join('van_user_photo', 'van_user_photo.van_id', '=', 'van.id')
                    ->join('user_photos', 'user_photos.id', '=', 'van_user_photo.user_photo_id')
                    ->where('van_track.track_id', '=', 2)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_evento)
                    ->where('van_track_info.evento', 'LIKE', '%' . $request->evento . '%')
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo', 'user_photos.arquivo as van_photo')
                    ->get();

                $citiesOne = Cities::where('state_id', '=', $request->estado_evento)->get();

                break;

            case 3:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->join('van_user_photo', 'van_user_photo.van_id', '=', 'van.id')
                    ->join('user_photos', 'user_photos.id', '=', 'van_user_photo.user_photo_id')
                    ->where('van_track.track_id', '=', 3)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_executivo)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo', 'user_photos.arquivo as van_photo')
                    ->get();

                $citiesOne = Cities::where('state_id', '=', $request->estado_executivo)->get();

                break;

            case 4:
                $vans = DB::table('van_track')
                    ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
                    ->join('van', 'van_track.van_id', '=', 'van.id')
                    ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
                    ->join('users', 'van.user_id', '=', 'users.id')
                    ->join('track', 'van_track.track_id', '=', 'track.id')
                    ->join('van_user_photo', 'van_user_photo.van_id', '=', 'van.id')
                    ->join('user_photos', 'user_photos.id', '=', 'van_user_photo.user_photo_id')
                    ->where('van_track.track_id', '=', 4)
                    ->where('van_track_info.cidade_saida', '=', $request->cidade_saida_frete)
                    ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo', 'user_photos.arquivo as van_photo')
                    ->get();

                $citiesOne = Cities::where('state_id', '=', $request->estado_frete)->get();

                break;
        }

        session()->flashInput($request->input());

        return view('site.resultado', compact('vans', 'track', 'states', 'citiesOne', 'citiesTwo'));
    }

    public function busca_index()
    {
        $track = Track::all();
        $states = States::orderBy('name')->get();

        $citiesOne = null;
        $citiesTwo = null;

        $vans = DB::table('van_track')
            ->join('van_track_info', 'van_track.id', '=', 'van_track_info.van_track_id')
            ->join('van', 'van_track.van_id', '=', 'van.id')
            ->join('cities as c', 'van_track_info.cidade_saida', '=', 'c.id')
            ->join('users', 'van.user_id', '=', 'users.id')
            ->join('track', 'van_track.track_id', '=', 'track.id')
            ->join('van_user_photo', 'van_user_photo.van_id', '=', 'van.id')
            ->join('user_photos', 'user_photos.id', '=', 'van_user_photo.user_photo_id')
            ->select('users.name as usuario_nome', 'users.celular as usuario_celular', 'users.id as usuario_id', 'van.model as van', 'van.plate as placa', 'van.seats as acentos', 'van.id as van_id', 'van.comment as comment', 'track.name as trajeto', 'van_track_info.periodo as periodo', 'user_photos.arquivo as van_photo')
            ->get();

        return view('site.resultado', compact('vans', 'track', 'states', 'citiesOne', 'citiesTwo'));
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

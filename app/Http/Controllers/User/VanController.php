<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Track;
use App\Models\Cities;
use App\Models\States;
use App\Models\User\UserPhotos;
use App\Models\User\Van;
use App\Models\User\VanTrack;
use App\Models\User\VanTrackInfo;
use App\Models\User\VanUserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class VanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = Van::where('user_id', '=', Auth::id())->get();
        return view('user.van.home', compact('vans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "model" => "required",
            "plate" => "required",
            "seats" => "required",
        ]);

        $van = new Van();
        $van->model = $request->model;
        $van->plate = $request->plate;
        $van->seats = $request->seats;

        $van->save();

        foreach ($request->track as $eachTrack) {

            $van_track = new VanTrack();
            $van_track->van_id = $van->id;
            $van_track->track_id = $eachTrack;
            $van_track->save();

            $vanTrackInfo = new VanTrackInfo();

            switch ($eachTrack) {
                case 1:
                    $vanTrackInfo->cidade_saida = $request->cidade_saida_escola;
                    $vanTrackInfo->cidade_chegada = $request->cidade_chegada_escola;
                    $vanTrackInfo->escola = $request->escola;
                    $vanTrackInfo->periodo = $request->periodo;
                    break;

                case 2:
                    $vanTrackInfo->cidade_saida = $request->cidade_saida_evento;
                    $vanTrackInfo->evento = $request->evento;
                    break;

                case 3:
                    $vanTrackInfo->cidade_saida = $request->cidade_saida_executivo;
                    break;

                case 4:
                    $vanTrackInfo->cidade_saida = $request->cidade_saida_frete;
                    break;
            }

            $vanTrackInfo->van_track_id = $van_track->id;
            $vanTrackInfo->save();
        }


        foreach ($request->van_user_photo as $eachPhoto) {
            $van_user_photo = new VanUserPhoto();
            $van_user_photo->van_id = $van->id;
            $van_user_photo->user_photo_id = $eachPhoto;
            $van_user_photo->save();
        }

        return view('user.van');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $van = Van::find($id);
        $track = Track::all();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();

        $photos = UserPhotos::where("user_id", "=", Auth::id())->get();
        $photos_selected = $van->van_photos();

        $track_selected = array();
        foreach ($van->track as $eachTrack) {

            $van_track = VanTrack::where("van_id", "=", $id)->where("track_id", "=", $eachTrack->id)->get();
            $info = VanTrackInfo::where("van_track_id", "=", $van_track[0]->id)->get();

            if (!empty($info[0])) {
                $track_selected[$eachTrack->id]['cidade_saida'] = $info[0]->cidade_saida;
                $track_selected[$eachTrack->id]['cidade_chegada'] = $info[0]->cidade_chegada;
                $track_selected[$eachTrack->id]['escola'] = $info[0]->escola;
                $track_selected[$eachTrack->id]['periodo'] = $info[0]->periodo;
                $track_selected[$eachTrack->id]['evento'] = $info[0]->evento;
            }
        }

        return view('user.van.edit', compact('van', 'track', 'track_selected', 'cities', 'states', 'photos', 'photos_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "model" => "required",
            "plate" => "required",
            "seats" => "required",
        ]);

        $van = Van::find($id);
        $van->model = $request->model;
        $van->plate = $request->plate;
        $van->seats = $request->seats;

        $van->save();

        if (!empty($request->track)) {

            VanTrack::where("van_id", "=", $van->id)->delete();

            foreach ($request->track as $eachTrack) {

                $van_track = new VanTrack();
                $van_track->van_id = $id;
                $van_track->track_id = $eachTrack;
                $van_track->save();

                $vanTrackInfo = new VanTrackInfo();

                switch ($eachTrack) {
                    case 1:
                        $vanTrackInfo->cidade_saida = $request->cidade_saida_escola;
                        $vanTrackInfo->cidade_chegada = $request->cidade_chegada_escola;
                        $vanTrackInfo->escola = $request->escola;
                        $vanTrackInfo->periodo = $request->periodo;
                        break;

                    case 2:
                        $vanTrackInfo->cidade_saida = $request->cidade_saida_evento;
                        $vanTrackInfo->evento = $request->evento;
                        break;

                    case 3:
                        $vanTrackInfo->cidade_saida = $request->cidade_saida_executivo;
                        break;

                    case 4:
                        $vanTrackInfo->cidade_saida = $request->cidade_saida_frete;
                        break;
                }

                $vanTrackInfo->van_track_id = $van_track->id;
                $vanTrackInfo->save();
            }
        } else {
            VanTrack::where("van_id", "=", $id)->delete();
        }


        VanUserPhoto::where("van_id", "=", $van->id)->delete();
        foreach ($request->van_user_photo as $eachPhoto) {
            $van_user_photo = new VanUserPhoto();
            $van_user_photo->van_id = $van->id;
            $van_user_photo->user_photo_id = $eachPhoto;
            $van_user_photo->save();
        }

        return redirect('user/van');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

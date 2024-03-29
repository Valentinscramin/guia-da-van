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
        $vans = Van::where('user_id', '=', Auth::id())->paginate(25);
        return view('user.van.home', compact('vans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = UserPhotos::where("user_id", "=", Auth::id())->get();
        $cities = Cities::orderBy('name')->get();
        $states = States::orderBy('name')->get();
        $track = Track::all();
        return view('user.van.new', compact('photos', 'track', 'photos', 'cities', 'states'));
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
        $van->comment = $request->comment;
        $van->user_id = Auth::id();

        $van->save();

        if (!empty(is_array($request->track))) {

            VanTrack::where("van_id", "=", $van->id)->delete();

            $array_insert = array();
            $track_amount = 0;
            foreach ($request->track as $eachTrack) {

                $van_track = new VanTrack();
                $van_track->van_id = $van->id;
                $van_track->track_id = $eachTrack;
                $van_track->save();

                $array_to_push = array();

                $array_to_push['van_track_id'] = $van_track->id;
                $array_to_push['cidade_saida'] = $request->cidade_saida[$track_amount];
                $array_to_push['cidade_chegada'] = @$request->cidade_chegada[$track_amount];
                $array_to_push['escola'] = $request->escola[$track_amount];
                $array_to_push['periodo'] = $request->periodo[$track_amount];
                $array_to_push['evento'] = $request->evento[$track_amount];

                array_push($array_insert, $array_to_push);

                $track_amount++;
            }

            VanTrackInfo::insert($array_insert);
        }


        if (isset($request->van_user_photo)) {
            foreach ($request->van_user_photo as $eachPhoto) {
                $van_user_photo = new VanUserPhoto();
                $van_user_photo->van_id = $van->id;
                $van_user_photo->user_photo_id = $eachPhoto;
                $van_user_photo->save();
            }
        }

        return redirect('user/van');
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
        $states = States::orderBy('name')->get();

        $photos = UserPhotos::where("user_id", "=", Auth::id())->get();
        $photos_selected = $van->van_photos($id);

        $array_photos_selected = array();
        foreach ($photos_selected as $eachPhotoSelected) {
            $array_photos_selected[] = $eachPhotoSelected->user_photo_id;
        }

        $track_selected = array();
        $count = 0;
        $listId = array();

        foreach ($van->track as $eachTrack) {
            if (!in_array($eachTrack->id, $listId, true)) {
                array_push($listId, $eachTrack->id);
            }
        }

        foreach ($listId as $eachTrack) {

            $van_track = VanTrack::where("van_id", "=", $id)->where("track_id", "=", $eachTrack)->get();

            foreach ($van_track as $eachOne) {

                $cidades_saida = "";
                $cidades_chegada = "";

                $info = VanTrackInfo::where("van_track_id", "=", $eachOne->id)->get();

                //dump($info);

                $cidades_saida_info = Cities::where("id", "=", $info[0]->cidade_saida)->get();
                $cidades_chegada_info = Cities::where("id", "=", $info[0]->cidade_chegada)->get();

                // dump($cidades_saida_info);
                // dd($cidades_chegada_info);

                if (count($cidades_saida_info) >= 1) {
                    $cidades_saida = cities::where("state_id", "=", $cidades_saida_info[0]->state_id)->get();
                }

                if (count($cidades_chegada_info) >= 1) {
                    $cidades_chegada = cities::where("state_id", "=", $cidades_chegada_info[0]->state_id)->get();
                }

                // $cidades_saida = cities::where("state_id", "=", $cidades_saida_info->state_id)->get();
                // $cidades_chegada = cities::where("state_id", "=", $cidades_chegada_info->state_id)->get();

                if (!empty($info)) {

                    if (count($cidades_saida_info) >= 1) {
                        $track_selected[$count]['estado_saida'] = $cidades_saida_info[0]->state_id;
                    }
                    if (count($cidades_chegada_info) >= 1) {
                        $track_selected[$count]['estado_chegada'] = $cidades_chegada_info[0]->state_id;
                    }

                    $track_selected[$count]['van_track_id'] = $eachOne->id;
                    $track_selected[$count]['id'] = $eachOne->track_id;
                    $track_selected[$count]['cidade_saida'] = $info[0]->cidade_saida;
                    $track_selected[$count]['cidades_estado_saida'] = $cidades_saida;
                    $track_selected[$count]['cidades_estado_chegada'] = $cidades_chegada;
                    $track_selected[$count]['cidade_chegada'] = $info[0]->cidade_chegada;
                    $track_selected[$count]['escola'] = $info[0]->escola;
                    $track_selected[$count]['periodo'] = $info[0]->periodo;
                    $track_selected[$count]['evento'] = $info[0]->evento;

                    $count++;
                }
            }
        }

        return view('user.van.edit', compact('van', 'track', 'track_selected', 'states', 'photos', 'array_photos_selected'));
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
        $van->comment = $request->comment;

        $van->save();

        if (!empty(is_array($request->track))) {

            VanTrack::where("van_id", "=", $van->id)->delete();

            $array_insert = array();
            $track_amount = 0;
            foreach ($request->track as $eachTrack) {

                $van_track = new VanTrack();
                $van_track->van_id = $id;
                $van_track->track_id = $eachTrack;
                $van_track->save();

                $array_to_push = array();

                $array_to_push['van_track_id'] = $van_track->id;
                $array_to_push['cidade_saida'] = $request->cidade_saida[$track_amount];
                $array_to_push['cidade_chegada'] = @$request->cidade_chegada[$track_amount];
                $array_to_push['escola'] = $request->escola[$track_amount];
                $array_to_push['periodo'] = $request->periodo[$track_amount];
                $array_to_push['evento'] = $request->evento[$track_amount];

                $track_amount++;

                array_push($array_insert, $array_to_push);
            }

            VanTrackInfo::insert($array_insert);
        } else {
            VanTrack::where("van_id", "=", $id)->delete();
        }

        if (isset($request->van_user_photo)) {
            VanUserPhoto::where("van_id", "=", $van->id)->delete();
            foreach ($request->van_user_photo as $eachPhoto) {
                $van_user_photo = new VanUserPhoto();
                $van_user_photo->van_id = $van->id;
                $van_user_photo->user_photo_id = $eachPhoto;
                $van_user_photo->save();
            }
        }

        return redirect('user/van');
    }


    public function remove(Request $request)
    {
        VanTrack::where("id", "=", $request->van_track_id)->delete();
        return redirect('user/van/' . $request->van . '/edit');
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

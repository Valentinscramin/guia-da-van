<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Track;
use App\Models\User;
use App\Models\User\Van;
use App\Models\VanTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        Van::create($request->all());

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

        $trackSelected = array();
        foreach ($van->track as $eachTrack) {
            array_push($trackSelected, $eachTrack->id);
        }

        return view('user.van.edit', compact('van', 'track', 'trackSelected'));
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

        foreach($request->track as $eachTrack)
        {
            dump($van->track);
            $van_track = VanTrack::where("van_id", "=", $id)->where("track_id", "=", $eachTrack)->get();
            dump($van_track);

        }

        die();

        $van->save();

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

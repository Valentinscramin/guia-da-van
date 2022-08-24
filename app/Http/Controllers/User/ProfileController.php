<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\UserPhotos;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $photos = UserPhotos::where("user_id", "=", Auth::id())->get();
        $profile_photo_checked = $user->user_photo_id;
        $profile_photo = UserPhotos::find($user->user_photo_id);
        if (isset($profile_photo)) {
            $profile_photo = @$profile_photo->arquivo;
        }
        return view('user.profile.home', compact('user', 'photos', 'profile_photo', 'profile_photo_checked'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {

            $user = User::find($id);

            $sum = 0;
            $count = 0;
            foreach ($user->avaliation as $eachAvaliation) {
                $count++;
                $sum += $eachAvaliation->avaliation;
            }

            $everage = $count / $sum;

        } catch (\Throwable $th) {
            return view('site.error', compact('th'));
        }

        return view('site.profile', compact('user', 'everage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.profile.home', compact('user'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->cpf_cnpj = $request->cpf_cnpj;
        $user->data_nascimento = $request->data_nascimento;
        $user->postcode = $request->postcode;
        $user->user_photo_id = $request->user_profile_photo;
        $user->save();

        return redirect('user/profile');
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

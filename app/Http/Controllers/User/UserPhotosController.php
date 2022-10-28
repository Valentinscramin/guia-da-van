<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = UserPhotos::where('user_id', '=', Auth::id())->get();
        return view('user.photos.home', compact('photos'));
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
            "arquivo" => "image|max:5120|required",
        ]);

        $user_photos = new UserPhotos();
        $user_photos->arquivo = $request->file('arquivo')->store('user_photos', 'public');
        $user_photos->user_id = Auth::id();
        $user_photos->save();
        return redirect('user/photos');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_photos = UserPhotos::find($id);

        if (isset($user_photos)) {
            Storage::disk('public')->delete($user_photos->arquivo);
            $user_photos->delete();
        }
        return redirect('user/photos');
    }

    public function download($id)
    {
        $user_photos = UserPhotos::find($id);
        if (isset($user_photos)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($user_photos->arquivo);
            return response()->download($path);
        }
        return redirect('user/photos');
    }
}

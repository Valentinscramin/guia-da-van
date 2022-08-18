<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = AdminPhotos::all();
        return view('admin.photos.home', compact('photos'));
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
        $admin_photo = new AdminPhotos();
        $admin_photo->arquivo = $request->file('arquivo')->store('admin_photos', 'public');
        $admin_photo->save();
        return redirect('admin/photos');
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
        $admin_photo = AdminPhotos::find($id);

        if (isset($admin_photo)) {
            Storage::disk('public')->delete($admin_photo->arquivo);
            $admin_photo->delete();
        }
        return redirect('admin/photos');
    }

    public function download($id)
    {
        $admin_photo = AdminPhotos::find($id);
        if (isset($admin_photo)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($admin_photo->arquivo);
            return response()->download($path);
        }
        return redirect('admin/photos');
    }
}

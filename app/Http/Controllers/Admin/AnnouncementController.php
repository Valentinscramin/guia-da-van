<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPhotos;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::all();
        return view("admin.announcement.home", compact("announcement"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = AdminPhotos::all();
        return view('admin.announcement.new', compact('photos'));
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
            "name" => "required",
            "url" => "required",
            "admin_photo_id" => "required",
        ]);

        $announcement = new Announcement();
        $announcement->name = $request->input('name');
        $announcement->url = $request->input('url');
        $announcement->active = $request->input('active') ? 1 : 0;
        $announcement->admin_photo_id = $request->admin_announcement_photo;
        $announcement->save();

        return redirect('/admin/announcement');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        $photos = AdminPhotos::all();
        $announcement_photo_checked = $announcement->admin_photo_id;
        return view('admin.announcement.edit', compact('announcement', 'photos', 'announcement_photo_checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);

        $announcement->name = $request->input('name');
        $announcement->url = $request->input('url');
        $announcement->active = $request->input('active') ? 1 : 0;
        $announcement->admin_photo_id = $request->admin_announcement_photo;
        $announcement->save();

        return redirect('/admin/announcement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

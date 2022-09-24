<?php

namespace App\Http\Controllers\User;

use App\Models\User\WebSiteComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebSiteCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.websitecomentario');
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
        $webSiteComment = new WebSiteComment();
        $webSiteComment->comment = $request->comment;
        $webSiteComment->active = 0;
        $webSiteComment->user_id = Auth::id();
        $webSiteComment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebSiteComment  $webSiteComment
     * @return \Illuminate\Http\Response
     */
    public function show(WebSiteComment $webSiteComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSiteComment  $webSiteComment
     * @return \Illuminate\Http\Response
     */
    public function edit(WebSiteComment $webSiteComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSiteComment  $webSiteComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebSiteComment $webSiteComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSiteComment  $webSiteComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebSiteComment $webSiteComment)
    {
        //
    }
}

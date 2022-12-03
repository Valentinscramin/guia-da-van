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
        $websitecomment = WebSiteComment::all();
        return view('admin.websitecomment.home', compact('websitecomment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.websitecomentario');
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
            'comment' => 'required',
        ]);

        $webSiteComment = new WebSiteComment();
        $webSiteComment->comment = $request->comment;
        $webSiteComment->active = 0;
        $webSiteComment->user_id = Auth::id();
        $webSiteComment->save();

        return redirect(route('user_home'));
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
    public function edit(WebSiteComment $webSiteComment, $id)
    {
        $webSiteCommentSelected = $webSiteComment->find($id);
        $user = $webSiteComment->userByid($webSiteCommentSelected->user_id);
        return view('admin.websitecomment.edit', compact('webSiteCommentSelected', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSiteComment  $webSiteComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $webSiteComment = WebSiteComment::find($id);
        $webSiteComment->comment = $request->comment;
        $webSiteComment->active = $request->active ? 1 : 0;
        $webSiteComment->save();

        return redirect('admin/web-site-comment-approve');
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

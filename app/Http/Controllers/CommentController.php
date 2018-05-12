<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\countries;
use App\categories;
use App\comments;
use App\posts;
use App\restaurants;
use App\roles;
use App\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve all the orders
        $comments = comments::all();
        // Load the view and pass the orders
        return View::make('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $validated = $request->validated();
        $comments = new comments;
        $comments->content = Input::get('content');
        $comments->post_id = Input::get('post_id');
        $comments->user_id = Input::get('user_id');
        $comments->save();
        // redirect
        Session::flash('message', 'Successfully created
        comment !');
        return Redirect::to('comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = comments::find($id);
        return View::make('comments.show')
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the order
        $comments = comments::find($id);
        // show the edit form and pass the order
        return View::make('comments.edit')
            ->with('comments', $comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, $id)
    {
        $validated = $request->validated();
        $comments = posts::find($id);
        $comments->content = Input::get('content');
        $comments->post_id = Input::get('post_id');
        $comments->user_id = Input::get('user_id');
        $comments->save();
        // redirect
        Session::flash('message', 'Successfully updated comment !');
        return Redirect::to('comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete
        $comments = comments::find($id);
        $comments->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the comment !');
        return Redirect::to('comments');
    }
}


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
use App\Http\Requests\StorePost;
use App\Http\Requests\StoreComment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve all the orders
        $posts = posts::all();
        // Load the view and pass the orders
        return View::make('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $posts = new posts;
        $posts->content = Input::get('content');
        $posts->restaurant_id = Input::get('restaurant_id');
        $posts->user_id = Input::get('user_id');
        $posts->save();
        // redirect
        Session::flash('message', 'Successfully created
        post !');
        return Redirect::to('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = posts::find($id);
        return View::make('posts.show')
            ->with('posts', $posts);
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
        $posts = posts::find($id);
        // show the edit form and pass the order
        return View::make('posts.edit')
            ->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $validated = $request->validated();
        $posts = posts::find($id);
        $posts->content = Input::get('content');
        $posts->restaurant_id = Input::get('restaurant_id');
        $posts->user_id = Input::get('user_id');
        $posts->save();
        // redirect
        Session::flash('message', 'Successfully created
        post !');
        return Redirect::to('posts');
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
        $posts = posts::find($id);
        $posts->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the post!');
        return Redirect::to('posts');
    }
    public function commentwithcreate($id)
    {
        $posts = posts::find($id);
        return
            View::make('posts.createcommentwithpostid')->with('posts', $posts);
    }


    public function createcommentwithpostid(StoreComment $request)
    {
        $validated = $request->validated();
        $comments = new comments([
            'content' => Input::get('content'),
            'user_id' => Input::get('user_id'),
        ]);
        $posts = posts::find(Input::post('post_id'));
        $posts ->comment()->save($comments);
        Session::flash('message', 'Successfully created comment detail!');
        return View::make('posts.show')
            ->with('posts', $posts);
    }
}

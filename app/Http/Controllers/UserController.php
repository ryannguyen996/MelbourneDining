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
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve all the orders
        $users = users::all();
        // Load the view and pass the orders
        return View::make('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $validated = $request->validated();
        $users = new users;
        $users->name = Input::get('name');
        $users->email = Input::get('email');
        $users->password = Input::get('password');
        $users->country_id = Input::get('country_id');
        $users->save();
        // redirect
        Session::flash('message', 'Successfully created
        user !');
        return Redirect::to('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = users::find($id);
        return View::make('users.show')
            ->with('users', $users);
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
        $users = users::find($id);
        // show the edit form and pass the order
        return View::make('users.edit')
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    {
        $validated = $request->validated();
            $users = users::find($id);
            $users->name = Input::get('name');
            $users->email = Input::get('email');
            $users->password = Input::get('password');
            $users->country_id = Input::get('country_id');
            $users->save();
            // redirect
            Session::flash('message', 'Successfully updated user !');
            return Redirect::to('users');
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
        $users = users::find($id);
        $users->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('users');
    }
}

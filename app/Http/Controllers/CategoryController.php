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
use App\Http\Requests\StoreCategory;
use App\Http\Requests\StoreRestaurant;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all the orders
        $categories = categories::all();
        // Load the view and pass the orders
        return View::make('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $validated = $request->validated();
        $categories = new categories;
        $categories->name = Input::get('name');
        $categories->save();
        // redirect
        Session::flash('message', 'Successfully created
        category !');
        return Redirect::to('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = categories::find($id);
        return View::make('categories.show')
            ->with('categories', $categories);
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
        $categories = categories::find($id);
        // show the edit form and pass the order
        return View::make('categories.edit')
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $validated = $request->validated();
        $categories = categories::find($id);
        $categories->name = Input::get('name');
        $categories->save();
        // redirect
        Session::flash('message', 'Successfully updated category!');
        return Redirect::to('categories');
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
        $categories = categories::find($id);
        $categories->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the category!');
        return Redirect::to('categories');
    }

    public function restaurantwithcreate($id)
    {
        $categories = categories::find($id);
        return
            View::make('categories.createrestaurantwithcategoryid')->with('categories', $categories);
    }


    public function createrestaurantwithcategoryid(StoreRestaurant $request)
    {
        $validated = $request->validated();
        $restaurants = new restaurants([
            'name' => Input::get('name'),
            'phone' => Input::get('phone'),
            'user_id' => Input::get('user_id'),
            'name' => Input::get('name'),
            'address1' => Input::get('address1'),
            'address2' => Input::get('address2'),
            'suburb' => Input::get('suburb'),
            'state' => Input::get('state'),
            'numberofseats' => Input::get('numberofseats'),
            'country_id' => Input::get('country_id'),
        ]);
        $categories = categories::find(Input::post('category_id'));
        $categories ->restaurant()->save($restaurants);
        Session::flash('message', 'Successfully created restaurant !');
        return View::make('categories.show') ->with('categories', $categories);
    }
}

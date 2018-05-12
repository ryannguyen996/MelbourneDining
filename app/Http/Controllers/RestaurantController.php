<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\countries;
use App\categories;
use App\comments;
use App\posts;
use App\users;
use App\roles;
use App\restaurants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreRestaurant;
use App\Http\Requests\StorePost;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve all the orders
        $restaurants = restaurants::all();
        // Load the view and pass the orders
        return View::make('restaurants.index')
            ->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurant $request)
    {
        $validated = $request->validated();
        $restaurants = new restaurants;
        $restaurants->name = Input::get('name');
        $restaurants->phone = Input::get('phone');
        $restaurants->address1 = Input::get('address1');
        $restaurants->address2 = Input::get('address2');
        $restaurants->suburb = Input::get('suburb');
        $restaurants->state = Input::get('state');
        $restaurants->numberofseats = Input::get('numberofseats');
        $restaurants->country_id = Input::get('country_id');
        $restaurants->category_id = Input::get('category_id');
        $restaurants->save();
        // redirect
        Session::flash('message', 'Successfully created
        restaurant !');
        return Redirect::to('restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurants = restaurants::find($id);
        return View::make('restaurants.show')
            ->with('restaurants', $restaurants);
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
        $restaurants = restaurants::find($id);
        // show the edit form and pass the order
        return View::make('restaurants.edit')
            ->with('restaurants', $restaurants);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurant $request, $id)
    {
        $validated = $request->validated();
        $restaurants = restaurants::find($id);
        $restaurants->name = Input::get('name');
        $restaurants->phone = Input::get('phone');
        $restaurants->address1 = Input::get('address1');
        $restaurants->address2 = Input::get('address2');
        $restaurants->suburb = Input::get('suburb');
        $restaurants->state = Input::get('state');
        $restaurants->numberofseats = Input::get('numberofseats');
        $restaurants->country_id = Input::get('country_id');
        $restaurants->category_id = Input::get('category_id');
        $restaurants->save();
        // redirect
        Session::flash('message', 'Successfully created
        restaurant !');
        return Redirect::to('restaurants');
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
        $restaurants = restaurants::find($id);
        $restaurants->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the restaurant!');
        return Redirect::to('restaurants');
    }
    public function restaurantwithdetails($id)
    {
        $restaurants = restaurants::find($id);
        return View::make('restaurants.restaurantwithdetails')->with('restaurants', $restaurants);

    }


    public function postwithcreate($id)
    {
        $restaurants = restaurants::find($id);
        return
            View::make('restaurants.createpostwithrestaurantid')->with('restaurants', $restaurants);
    }


    public function createpostwithrestaurantid(StorePost $request)
    {

        $validated = $request->validated();
        $posts = new posts([
            'content' => Input::get('content'),
            'restaurant_id' => Input::get('restaurant_id'),
            'user_id' => Input::get('user_id'),
        ]);
        $restaurants = restaurants::find(Input::post('restaurant_id'));
        $restaurants ->post()->save($posts);
        Session::flash('message', 'Successfully created post detail!');
        return View::make('restaurants.restaurantwithdetails')->with('restaurants', $restaurants);
    }
}

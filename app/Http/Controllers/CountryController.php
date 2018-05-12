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
use App\Http\Requests\StoreCountry;
use App\Http\Requests\StoreRestaurant;

class CountryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// Retrieve all the orders
		$countries = countries::all();
		// Load the view and pass the orders
		return View::make('countries.index')
			->with('countries', $countries);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return View::make('countries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCountry $request)
	{
	   $validated = $request->validated();
			$countries = new countries;
			$countries->name = Input::get('name');
			$countries->save();
			// redirect
			Session::flash('message', 'Successfully created
			country !');
			return Redirect::to('countries');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$countries = countries::find($id);
		return View::make('countries.show')
			->with('countries', $countries);
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
		$countries = countries::find($id);
		// show the edit form and pass the order
		return View::make('countries.edit')
			->with('countries', $countries);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreCountry $request, $id)
	{
	  $validated = $request->validated();
			$countries = countries::find($id);
			$countries->name = Input::get('name');
			$countries->save();
			// redirect
			Session::flash('message', 'Successfully updated country!');
			return Redirect::to('countries');

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
		$countries = countries::find($id);
		$countries->delete();
		// redirect
		Session::flash('message', 'Successfully deleted the country!');
		return Redirect::to('countries');
	}

	public function restaurantwithcreate($id)
	{
		$countries = countries::find($id);
		return
			View::make('countries.createrestaurantwithcountryid')->with('countries', $countries);
	}


	public function createrestaurantwithcountryid(StoreRestaurant $request)
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
			'category_id' => Input::get('category_id'),
		]);
		$countries = countries::find(Input::post('country_id'));
		$countries ->restaurant()->save($restaurants);
		Session::flash('message', 'Successfully created restaurant !');
		return View::make('countries.show') ->with('countries', $countries);
	}
}

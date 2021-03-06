<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantAPIController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return restaurants::all();
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
		$restaurants = restaurants::create($request->all());
		return response()->json($restaurants, 201);
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
	public function update(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$restaurants->update($request->all());
		return response()->json($restaurants, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$restaurants->delete();
		return response()->json(null, 204);
	}

	public function createpost(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$posts = $restaurants->post()->create($request->all());
		return response()->json($posts, 201);
	}

	public function updatepost(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$restaurants->post->find($request['postid'])->update($request->all());
		return response()->json($restaurants->post->find($request['postid']), 201);
	}

	public function deletepost(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$restaurants->post->find($request['postid'])->delete();
		return response()->json(null, 204);
	}

	public function getposts(Request $request)
	{
		$restaurants = restaurants::find($request['id']);
		$return = $restaurants->post->all();
		foreach ($return as $value) {
			response()->json($value);
			response()->json($value->comment->all());
		}
		return $restaurants;
	}

	public function getrestaurants(Request $request)
	{
		$restaurants = restaurants::where([
			['country_id', '=', $request['country_id']],
			['category_id', '=', $request['category_id']] ])->get();
		return response()->json($restaurants, 200);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class PostAPIController extends Controller
{
	public function index()
	{
		return posts::all();
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
		$posts = posts::create($request->all());
		return response()->json($posts, 201);
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
		$posts = posts::find($request['id']);
		$posts->update($request->all());
		return response()->json($posts, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		$posts = posts::find($request['id']);
		$posts->delete();
		return response()->json(null, 204);
	}

	public function createcomment(Request $request)
	{
		$posts = posts::find($request['id']);
		$comments = $posts->comment()->create($request->all());
		return response()->json($comments, 201);
	}

	public function updatecomment(Request $request)
	{
		$posts = posts::find($request['id']);
		$posts->comment->find($request['commentid'])->update($request->all());
		return response()->json($posts->comment->find($request['commentid']), 201);
	}

	public function deletecomment(Request $request)
	{
		$posts = posts::find($request['id']);
		$posts->comment->find($request['commentid'])->delete();
		return response()->json(null, 204);
	}
}

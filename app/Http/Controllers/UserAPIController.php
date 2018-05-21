<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreUser;

class UserAPIController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return users::all();
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
	public function store(StoreUser $request)
	{
		if (isset($request->validator) && $request->validator->fails()){
            return response()->json($request->validator->getMessageBag(), 400);
        }
        else{
						$users = users::create($request->all());
						return response()->json($users, 201);
				}
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
	public function update(StoreUser $request)
	{
		$id = $request->input('id');
		$users = users::find($request['id']);
		if (!isset($users))
        {
            return response()->json(['message'=>'Cannot find User ID '.$id.' .Please enter User ID again.'], 400);
        }
        else{
            if (isset($request->validator) && $request->validator->fails()){
                return response()->json($request->validator->getMessageBag(), 400);
            }
            else{
							$users->update($request->all());
							return response()->json($users, 201);
							}
							}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		$id = $request->input('id');
		$users = users::find($request['id']);
		if (!isset($users))
            {
                return response()->json(['message'=>'Cannot find User ID '.$id.' .Please enter User ID again.'], 400);
            }
      else{
					$users->delete();
					return response()->json(null, 204);
		}
	}
}

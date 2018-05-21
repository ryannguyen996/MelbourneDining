<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreRole;

class RoleAPIController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return roles::all();
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
	public function store(StoreRole $request)
	{
		if (isset($request->validator) && $request->validator->fails()){
            return response()->json($request->validator->getMessageBag(), 400);
        }
		else{
				$roles = roles::create($request->all());
				return response()->json($roles, 201);
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
	public function update(StoreRole $request)
	{
		$id = $request->input('id');
		$roles = roles::find($request['id']);
		if (!isset($roles))
        {
            return response()->json(['message'=>'Cannot find Role ID '.$id.' .Please enter Role ID again.'], 400);
        }
        else{
            if (isset($request->validator) && $request->validator->fails()){
                return response()->json($request->validator->getMessageBag(), 400);
            }
				else{
						$roles->update($request->all());
						return response()->json($roles, 201);
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
		$roles = roles::find($request['id']);
		if (!isset($roles))
            {
                return response()->json(['message'=>'Cannot find Role ID '.$id.' .Please enter Role ID again.'], 400);
            }
            else{
								$roles->delete();
								return response()->json(null, 204);
		}
	}
}

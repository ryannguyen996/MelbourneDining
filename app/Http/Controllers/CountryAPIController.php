<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreCountry;


class CountryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return countries::all();
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
    public function store(StoreCountry $request)
    {
        if (isset($request->validator) && $request->validator->fails()){
            return response()->json($request->validator->getMessageBag(), 400);
        }
        else{
            $country = countries::create($request->all());
            return response()->json($country, 201);
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
    public function update(StoreCountry $request)
    {
        $country = countries::find($request['id']);
        if (!isset($country))
        {
            return response()->json(['message'=>'Id not found'], 400);
        }
        else{
            if (isset($request->validator) && $request->validator->fails()){
                return response()->json($request->validator->getMessageBag(), 400);
            }
            else{
                $country->update($request->all());
                return response()->json($country, 201);
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
        $country = countries::find($request['id']);
        if (!isset($country))
        {
            return response()->json(['message'=>'Id not found'], 400);
        }
        else{
            $country->delete();
            return response()->json(null, 204);
        }
    }
}

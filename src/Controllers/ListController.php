<?php

namespace MetaverseSystems\ListBackend\Controllers;

use MetaverseSystems\ListBackend\Models\msList;
use Illuminate\Http\Request;

class ListController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = msList::get();
        return $lists;
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
        $list = new msList;
        $list->user_id = 0;
        $list->id = (string)\Str::uuid();
        $list->name = $request->input('name');
        $list->save();
        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\msList  $list
     * @return \Illuminate\Http\Response
     */
    public function show(msList $list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\msList  $list
     * @return \Illuminate\Http\Response
     */
    public function edit(msList $list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\msList  $list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, msList $list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\msList  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy(msList $list)
    {
        //
    }
}

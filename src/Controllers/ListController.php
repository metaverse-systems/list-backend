<?php

namespace MetaverseSystems\ListBackend\Controllers;

use MetaverseSystems\ListBackend\Models\msList;
use Illuminate\Http\Request;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'hasCheckbox' => 'required',
            'hasCount' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $list = new msList;
        $list->user_id = 0;
        $list->id = (string)\Str::uuid();
        $list->name = $request->input('name');
        $list->hasCheckbox = $request->input('hasCheckbox');
        $list->hasCount = $request->input('hasCount');
        $list->save();
        return response()->json($list, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\msList  $list
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = msList::where('id', $id)->first();
        return $list;
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'hasCheckbox' => 'required',
            'hasCount' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $list = msList::where('id', $id)->first();
        if(!$list)
        {
            return response()->json(['error' => "List $id not found."], 404);
        }

        $list->name = $request->input('name');
        $list->hasCheckbox = $request->input('hasCheckbox');
        $list->hasCount = $request->input('hasCount');
        $list->save();
        return response()->json($list, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = msList::where('id', $id)->first();
        if(!$list)
        {
            return response()->json(['error' => "List $id not found."], 404);
        }

        $list->delete();
        return response()->json([], 204);
    }
}

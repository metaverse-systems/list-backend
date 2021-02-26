<?php

namespace MetaverseSystems\ListBackend\Controllers;

use MetaverseSystems\ListBackend\Models\msList;
use MetaverseSystems\ListBackend\Models\ListEntry;
use Illuminate\Http\Request;

class ListEntryController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($list_id)
    {
        $entries = ListEntry::where('list_id', $list_id)->get();
        return $entries;
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
    public function store($list_id, Request $request)
    {
        $entry = new ListEntry;
        $entry->user_id = 0;
        $entry->list_id = $list_id;
        $entry->id = (string)\Str::uuid();
        $entry->text = $request->input('text');
        $entry->checked = $request->input('checked');
        $entry->count = $request->input('count');
        $entry->save();
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

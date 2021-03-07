<?php

namespace MetaverseSystems\ListBackend\Controllers;

use MetaverseSystems\ListBackend\Models\msList;
use MetaverseSystems\ListBackend\Models\ListEntry;
use Illuminate\Http\Request;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'checked' => 'required',
            'count' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $entry = new ListEntry;
        $entry->user_id = 0;
        $entry->list_id = $list_id;
        $entry->id = (string)\Str::uuid();
        $entry->text = $request->input('text');
        $entry->checked = $request->input('checked');
        $entry->count = $request->input('count');
        $entry->save();
        return response()->json($entry, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $list_id
     * @param  $entry_id
     * @return \Illuminate\Http\Response
     */
    public function show($list_id, $entry_id)
    {
        $entry = ListEntry::where('id', $entry_id)->where('list_id', $list_id)->first();
        if(!$entry)
        {
            return response()->json(['error' => "Entry $entry_id not found on list $list_id."], 404);
        }

        return $entry;
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
     * @param  $list_id
     * @param  $entry_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $list_id, $entry_id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'checked' => 'required',
            'count' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $entry = ListEntry::where('id', $entry_id)->where('list_id', $list_id)->first();
        if(!$entry)
        {
            return response()->json(['error' => "Entry $entry_id not found on list $list_id."], 404);
        }

        $entry->text = $request->input('text');
        $entry->checked = $request->input('checked');
        $entry->count = $request->input('count');
        $entry->save();
        return response()->json($entry, 200);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $list_id
     * @param  $entry_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($list_id, $entry_id)
    {
        $entry = ListEntry::where('id', $entry_id)->where('list_id', $list_id)->first();
        if(!$entry)
        {
            return response()->json(['error' => "Entry $entry_id not found on list $list_id."], 404);
        }

        $entry->delete();
        return response()->json(['success' => "Entry $entry_id deleted from list $list_id."], 200);
    }
}

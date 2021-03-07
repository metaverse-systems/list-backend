<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['api'], 'prefix'=>'api' ], function () {
    Route::get('list', 'MetaverseSystems\ListBackend\Controllers\ListController@index');
    Route::get('list/{id}', 'MetaverseSystems\ListBackend\Controllers\ListController@show');
    Route::post('list', 'MetaverseSystems\ListBackend\Controllers\ListController@store');
    Route::post('list/{id}', 'MetaverseSystems\ListBackend\Controllers\ListController@update');
    Route::delete('list/{id}', 'MetaverseSystems\ListBackend\Controllers\ListController@destroy');

    Route::get('list/{list_id}/entry', 'MetaverseSystems\ListBackend\Controllers\ListEntryController@index');
    Route::get('list/{list_id}/entry/{entry_id}', 'MetaverseSystems\ListBackend\Controllers\ListEntryController@show');
    Route::post('list/{list_id}/entry', 'MetaverseSystems\ListBackend\Controllers\ListEntryController@store');
    Route::post('list/{list_id}/entry/{entry_id}', 'MetaverseSystems\ListBackend\Controllers\ListEntryController@update');
    Route::delete('list/{list_id}/entry/{entry_id}', 'MetaverseSystems\ListBackend\Controllers\ListEntryController@destroy');
});

<?php

namespace MetaverseSystems\ListBackend\Models;

use Illuminate\Database\Eloquent\Model;

class ListEntry extends Model
{

    public $incrementing = false;
    protected $keyType = "string";
    protected $table = "metaverse_systems_list_entries";

    public function msList()
    {
        return $this->belongsTo('MetaverseSystems\ListBackend\Models\msList');
    }
}

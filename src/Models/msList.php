<?php

namespace MetaverseSystems\ListBackend\Models;

use Illuminate\Database\Eloquent\Model;

class msList extends Model
{

    public $incrementing = false;
    protected $keyType = "string";
    protected $table = "metaverse_systems_lists";

    public function entries()
    {
        return $this->hasMany('MetaverseSystems\ListBackend\Models\ListEntry');
    }
}

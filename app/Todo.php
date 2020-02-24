<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $guarded = [];

    public function getRouteKeyName()
	{
	    return 'id';//db name column
	}

	// public function getRouteKey()
	// {
	//     return 'id';
	// }
}

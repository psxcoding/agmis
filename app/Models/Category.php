<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function items()
	{
		return $this->morphedByMany('App\Models\Item', 'categorables');
	}

}

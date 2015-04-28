<?php

class Event extends \Eloquent {

	protected $table = 'events';

	protected $fillable = ['user_id', 'category_id', 'name', 'description', 'location', 'started_at', 'ended_at'];

	public function categories()
	{
		$this->belongsTo('categories', 'category_id');
	}
}
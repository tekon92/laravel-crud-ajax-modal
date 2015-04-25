<?php

class Category extends \Eloquent {
	protected $fillable = ['name', 'slug'];

	protected $table = 'event_categories';
}
<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agrement extends Model
{
	// use HasFactory;
	
	protected $table = "agrement";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'titre',
		'option1',
		'option2',
		'option3',
		'option4',
		'option5',
		// 'climatiseur',
		// 'gps',
		// 'air_bag',
		// 'lecteur cd ou usb ou radio',
		// 'kilométrage',
		// 'portières'
		// 'boîte',


	];

	public static $rules = [
		'titre'   => 'required|string',
	];

	public function hasAttribute($attr)
	{
		return array_key_exists($attr, $this->attributes);
	}

	public function voitures(){
		return $this->belongsToMany(Voiture::class)
		->withTimestamps()
		->withPivot([
			'valeur',
		]);
	}
}

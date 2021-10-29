<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
	// use HasFactory;
	
	protected $table = "voiture";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'titre',
		'description',
		'prix',
		// 'annee',
		// 'passagers',
		'marque',
		'image1',
		'image2',
		'image3',
		'image4',
		// 'climatiseur',
		// 'gps',
		// 'air_bag',
		// 'lecteur_cd',
		// 'lecteur_usb',
		// 'boîte',


	];

	public static $rules = [
		'titre'     => 'required|string',
		'marque'    => 'required|string',
		'prix'      => 'required|integer',
		// 'annee'     => 'required|integer',
		// 'passagers' => 'required|integer',
	];

	public function agrements(){
		return $this->belongsToMany(Agrement::class)
		->withTimestamps()
		->withPivot([
			'valeur',
		]);
	}
	
	public function user(){
		return $this->belongsToMany(
			User::class,
			'location',
			'voiture_id',
			'user_id',
		)
		->withTimestamps()
		->withPivot([
			'from',
			'to',
		])
		->as('location');
	}

}

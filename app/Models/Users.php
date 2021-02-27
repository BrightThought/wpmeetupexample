<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property string display_name
 */

class Users extends Model
{

	/**
	 * Allow for all of the fields to be fillable
	 *
	 * @var array
	 */
	protected $guarded = ['user_pass', 'user_registered'];

	/**
	 * Ignore setting timestamps
	 *
	 * @var bool ]
	 */
	public $timestamps = false;

	/**
	 * Updates the default primary key of the model
	 *
	 * @var string
	 */
	protected $primaryKey = 'ID';

	/**
	 * Automatically get meta data with the user
	 *
	 * @var string[]
	 */
	protected $with = ['meta'];

	/**
	 * Set the model table
	 *
	 * @var string
	 */
	protected $table = 'wp_users';

	/**
	 * Create relationship for user meta data
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function meta(){
		return $this->hasMany(UsersMeta::class, 'user_id');
	}

	/**
	 * Creates relationship for posts
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function posts(){
		return $this->hasMany(Posts::class, 'post_author');
	}
}

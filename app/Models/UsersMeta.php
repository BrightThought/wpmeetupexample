<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UsersMeta extends Model
{

	/**
	 * Allow all columns to the assignable
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * Ignore the table timestamps
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Set the primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'umeta_id';

	/**
	 * Set table for model
	 *
	 * @var string
	 */
	protected $table = 'wp_usermeta';

	/**
	 * Create relation to the main user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(){
		return $this->belongsTo(Users::class, 'ID', 'user_id');
	}
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model{

	protected $guarded = [];

	public $timestamps = false;

	public function __construct( array $attributes = [] ) {
		global $wpdb;

		$this->table = $wpdb->prefix . 'postmeta';
		parent::__construct( $attributes );
	}

	/**
	 * Returns the related post
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function post()
	{
		return $this->belongsTo(Posts::class, 'post_id', 'ID');
	}

	/**
	 * Automatically unserialize the meta data only if it was serialized initially
	 *
	 * @param $value
	 *
	 * @return mixed
	 */
	public function getMetaValueAttribute( $value )
	{
		if(($data = unserialize($value)) !== false) {
			return $data;
		}

		return $value;
	}
}

<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    /**
     * Allow all columns to be updated
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Disabled eloquent timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The default primary key
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Posts constructor.
     *
     * @param array $attributes
     */
    public function __construct( array $attributes = [] ) {
        global $wpdb;

        $this->table = $wpdb->prefix . 'posts';
        parent::__construct( $attributes );
    }

    /**
     * Return the meta data of the post relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta(){
        return $this->hasMany(PostMeta::class, 'post_id',  'ID');
    }

    /**
     * Return the post author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(Users::class, 'post_author', 'ID');
    }
}

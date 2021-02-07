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
}

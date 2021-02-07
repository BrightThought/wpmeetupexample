<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Venues extends Model {

    /**
     * Allow all columns to be updated
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Posts constructor.
     *
     * @param array $attributes
     */
    public function __construct( array $attributes = [] ) {
        global $wpdb;

        $this->table = $wpdb->prefix . 'venues';
        parent::__construct( $attributes );
    }
}

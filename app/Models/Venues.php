<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

/**
 * Venues Model
 *
 * @property integer id
 * @property string type
 * @property integer location_number
 * @property integer region_id
 * @property integer location_id
 * @property integer brand_id
 * @property string name
 * @property string address1
 * @property string address2
 * @property string country
 * @property string city
 * @property string state
 * @property string zip
 * @property string url
 * @property boolean active
 * @property boolean deleted
 * @property boolean audiovisual
 * @property boolean creative
 * @property boolean internet
 * @property boolean power
 * @property boolean rigging
 * @property boolean specialty_ics
 * @property boolean specialty_ims
 * @property boolean specialty_power
 * @property boolean specialty_rigging
 * @property string guid
 * @property string guid_redirect
 * @property string contact_name
 * @property string contact_title
 * @property string contact_phone
 * @property string contact_email
 * @property string latitude
 * @property string longitude
 *
 * @author Erik Thomas <erik@brightthought.co>
 * @package Pegasus\Models
 */
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

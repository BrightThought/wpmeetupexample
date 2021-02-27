<?php

namespace App\Controllers;

use App\Models\Venues;
use Sober\Controller\Controller;

class Location extends Controller
{
    /**
     * Holds the location data
     *
     * @var Venues|null
     */
    private ?Venues $location;

    /**
     * Location constructor.
     *
     * Gathers the location information for the location query variable
     *
     */
    public function __construct(){
        $guid = get_query_var('location_guid');
        $guid = '/' . rtrim($guid, '/');

        $this->location = Venues::where('guid', $guid)->first();
    }

    /**
     * Checks if the location was found and if not set page to 404
     */
    public function __before() {
        global $wp_query;

        if(!$this->location){
            $wp_query->set_404();
            status_header( 404 );
        }
    }

    /**
     * Determines if the location code not be found
     *
     * @return bool
     */
    public function error404(){
        return ! $this->location;
    }

    /**
     * Passes the location object
     *
     * @return mixed
     */
    public function location(){
        return $this->location;
    }
}

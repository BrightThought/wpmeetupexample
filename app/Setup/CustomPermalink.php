<?php

namespace App\Setup;

/**
 * Class CustomPermalink
 *
 * @package App\Setup
 *
 * @author erik@brightthought.co
 */
class CustomPermalink {

	/**
	 * @var CustomPermalink|null
	 */
	private static ?CustomPermalink $_instance = null;

	/**
	 * Holds custom tags
	 *
	 * @var string[]
	 */
	private array $tags = [
		'location_guid'
	];

	/**
	 * EncorePermalink constructor.
	 */
	private function __construct() {
		add_action('generate_rewrite_rules', [$this, 'locationsPermalink'], 10, 1);
		add_action('init', [$this, 'rewriteTags'], 10);
	}

	/**
	 * Initiates the class
	 *
	 * @return CustomPermalink|null
	 */
	public static function init(): ?CustomPermalink {
		if(!self::$_instance instanceof self){
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Add rewrite rules
	 */
	public function rewriteTags(): void{
		foreach($this->tags as $tag) {
			add_rewrite_tag( '%' . $tag . '%', '([^&]+)' );
		}
	}

	/**
	 *
	 * Adds the catch for location urls
	 *
	 * @param $wp_rewrite
	 *
	 * @return string[]
	 */
	public function locationsPermalink( $wp_rewrite ): array {
		$rules = [ '(^\blocations/\b.*)/?' => 'index.php?location_guid=$matches[1]'	];

		$wp_rewrite->rules = $rules + $wp_rewrite->rules;
		return $wp_rewrite->rules;
	}

    /**
     * Handles injecting custom templates files
     *
     * @param $templates
     *
     * @return string[]
     */
	public static function permalinkTemplates( $templates ): array {
        $event = get_query_var('location_guid');

        if( ! empty($event) ) $templates = ['location.php'];

        return $templates;
    }
}

<?php

namespace stefblokdijk\LaravelPrismicHelper;

use Prismic\Api;
use Prismic\LinkResolver;
use Prismic\Predicates;

class LaravelPrismicHelper
{

    /**
     * Prismic API Instance
     * @var Prismic\Api
     */
    public $api;

    /**
     * Language
     * @var string
     */
    public $language;

    public function __construct()
    {

        /**
         * Create API Instance
         */
        $this->api = Api::get(config('prismic.repository_url'));

        /**
         * Set Default Language
         */
        $this->language = config('prismic.language');

    }

    /**
     * Set language for request
     *
     * @param  string $language
     * @return LaravelPrismicHelper
     */
    public function language($language)
    {

        /**
         * Set language and convert short language codes to full language
         */
        switch ($language) {
            case 'nl':
                $this->language = 'nl-nl';
            break;

            case 'en':
                $this->language = 'en-us';
            break;

            default:
                $this->language = $language;
            break;
        }

        /**
         * Return this
         */
        return $this;

    }

    /**
     * Get all items by an given type
     *
     * @param  string $type
     * @param  array  $filters
     * @return Collection
     */
    public function getByType($type, $options = [], $predicates = [])
    {

        /**
         * Get content
         */
        $query = $this->api->query(
            array_merge(
                [
                    Predicates::at('document.type', $type),
                ],
                $predicates
            ),
            array_merge(
                [
                    'lang' => $this->language
                ],
                $options
            ),
        );

        /**
         * Create collection
         */
        $content = collect($query->results);

        /**
         * Return content
         */
        return $content;

    }

    /**
     * Get Content from a single type
     *
     * @param  string $type
     * @return object
     */
    public function getSingle($type)
    {

        /**
         * Query API
         */
        $query = $this->api->query(
            Predicates::at('document.type', $type),
            [
                'lang' => $this->language,
            ],
        );

        /**
         * Handle content not found
         */
        if(empty($query->results)){

            abort(404);

        }

        /**
         * Get content
         */
        $content = $query->results[0];

        /**
         * Return content
         */
        return $content;

    }

    /**
     * Get Content from UID
     *
     * @param  string $type
     * @return object
     */
    public function getByUID($uid, $type)
    {

        /**
         * Query API
         */
        $query = $this->api->query(
            Predicates::at('my.'.$type.'.uid', $uid),
            [
                'lang' => $this->language,
            ],
        );

        /**
         * Handle content not found
         */
        if(empty($query->results)){

            abort(404);

        }

        /**
         * Get content
         */
        $content = $query->results[0];

        /**
         * Return content
         */
        return $content;

    }

}

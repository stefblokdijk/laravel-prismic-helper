<?php

use Prismic\Dom\RichText;
use Carbon\Carbon;

if (!function_exists('prismic_group')) {

    /**
     * convert prismic group to collection
     *
     * @param
     * @return Collection
     */
    function prismic_group($content, $key)
    {
        return (isset($content->data->{$key}) && is_array($content->data->{$key})) ? collect($content->data->{$key}) : collect();
    }

}

if (!function_exists('prismic_as_html')) {

    /**
     * convert prismic to html
     *
     * @param
     * @return
     */
    function prismic_as_html($content, $key)
    {

        if(isset($content->data->{$key})) {

            return RichText::asHtml($content->data->{$key});

        } else if(isset($content->{$key})) {

            return RichText::asHtml($content->{$key});

        } else {

            return null;

        }

    }

}

if (!function_exists('prismic_as_text')) {

    /**
     * convert prismic to html
     *
     * @param
     * @return
     */
    function prismic_as_text($content, $key)
    {

        if(isset($content->data->{$key})) {

            return RichText::asText($content->data->{$key});

        } else if(isset($content->{$key})) {

            return RichText::asText($content->{$key});

        } else {

            return null;

        }

    }

}

if (!function_exists('prismic_as_date')) {

    /**
     * convert prismic to date
     *
     * @param object $content
     * @param string $key
     * @param string $format
     * @return string
     */
    function prismic_as_date($content, $key, $format)
    {

        if(isset($content->data->{$key})) {

            return Carbon::parse($content->data->{$key})->isoFormat($format);

        } else if(isset($content->{$key})) {

            return Carbon::parse($content->{$key})->isoFormat($format);

        } else {

            return null;

        }

    }

}

if (!function_exists('prismic_file_url')) {

    /**
     * get prismic file url
     *
     * @param object $content
     * @param string $key
     * @return string
     */
    function prismic_file_url($content, $key)
    {

        if(isset($content->data->{$key}->url)) {

            return $content->data->{$key}->url;

        } else if(isset($content->{$key}->url)) {

            return $content->{$key}->url;

        } else {

            return null;

        }

    }

}

if (!function_exists('prismic_image_url')) {

    /**
     * convert prismic to date
     *
     * @param object $content
     * @param string $key
     * @return string
     */
    function prismic_image_url($content, $key)
    {

        if(isset($content->data->{$key}->url)) {

            return $content->data->{$key}->url;

        } else if(isset($content->{$key}->url)) {

            return $content->{$key}->url;

        } else {

            return null;

        }
    }

}

if (!function_exists('prismic_image_alt')) {

    /**
     * Get prismic image alt text
     *
     * @param object $content
     * @param string $key
     * @return string
     */
    function prismic_image_alt($content, $key)
    {

        if(isset($content->data->{$key}->alt)) {

            return $content->data->{$key}->alt;

        } else if(isset($content->{$key}->alt)) {

            return $content->{$key}->alt;

        } else {

            return null;

        }
    }

}

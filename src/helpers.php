<?php

use Prismic\Dom\RichText;
use Carbon\Carbon;

if (!function_exists('prismic_as_html')) {

    /**
     * convert prismic to html
     *
     * @param
     * @return
     */
    function prismic_as_html($content, $key)
    {
        return isset($content->data->{$key}) ? RichText::asHtml($content->data->{$key}) : null;
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
        return isset($content->data->{$key}) ? RichText::asText($content->data->{$key}) : null;
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
        return isset($content->data->{$key}) ? (string) Carbon::parse($content->data->{$key})->isoFormat($format) : null;
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
        return isset($content->data->{$key}->url) ? $content->data->{$key}->url : null;
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
        return isset($content->data->{$key}->url) ? $content->data->{$key}->url : null;
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
        return isset($content->data->{$key}->alt) ? $content->data->{$key}->alt : null;
    }

}

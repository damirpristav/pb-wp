<?php

function sanitize_dropdown( $value ) {

    if ( ! is_array( $value ) ) {
        return array();
    }
    return $value;

}

function sanitize_radio( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function sanitize_checkbox( $input ){

    if ( $input ) {
        $output = true;
    } else {
        $output = false;
    }
    return $output;

}

function sanitize_font( $input ){

    $response = wp_remote_get( 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAjdpY-ts6VqUNUqkTMOuCRD6PLmLQo4D0' );
    $fonts = json_decode( $response['body'] );
    $items = $fonts->items;

    $key_arr = array();
    $val_arr = array();
    $font_arr = array();

    foreach( $items as $item ){
        array_push( $key_arr, strtolower( preg_replace('/\s+/', '_', $item->family) ) );
        array_push( $val_arr, $item->family );
    }

    $font_arr = array_combine( $key_arr, $val_arr );

    if ( array_key_exists( $input, $font_arr ) ) {
        return $input;
    } else {
        return '';
    }
}

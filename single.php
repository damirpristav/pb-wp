<?php

if( is_attachment() ){

    get_header('v4');

}else{

    // get the header
    PRT_PinkButterflies::get_single_post_header( get_the_ID() );

}

// get single post
PRT_PinkButterflies::get_single_post( get_the_ID() );

// subscription form
PRT_PinkButterflies::get_subscription_section();

// get the footer
get_footer();

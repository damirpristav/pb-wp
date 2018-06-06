<?php

PRT_PinkButterflies::get_theme_header();

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
$version = get_term_meta( $cat_id, 'prt_pb_category_version', true );

if( isset( $version ) && !empty( $version ) ){
    if( $version === 'v2' ){
        get_template_part( 'partials/category/category', 'v2' );
    }else{
        get_template_part( 'partials/category/category', 'v1' );
    }
}else{
    get_template_part( 'partials/category/category', 'v2' );
}

// subscription form
PRT_PinkButterflies::get_subscription_section();

get_footer();

?>

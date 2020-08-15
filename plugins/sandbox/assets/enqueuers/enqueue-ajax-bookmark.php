<?php

add_action( 'init', 'ajax_bookmark_enqueuer' );

function ajax_bookmark_enqueuer() {
   wp_register_script( "my_bookmark_script", WP_PLUGIN_URL.'/sandbox/assets/js/ajax_bookmark.js', array('jquery') );
   wp_localize_script( 'my_bookmark_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'my_bookmark_script' );

}

?>
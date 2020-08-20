<?php

$bookmark = get_user_meta( $user_id, 'bookmark', false );

function bookmark_ajax_scripts() {

  wp_enqueue_script(
    'bookmark-frontend-js',
    plugin_dir_url( __FILE__ ) . '/assets/js/frontend-main.js',
    ['jquery'],
    time(),
    true
  );    

  wp_localize_script(
    'bookmark-frontend-js',
    'bookmark_globals',
    [
      'ajax_url'    => admin_url( 'admin-ajax.php' ),
      'is_bookmarked' => get_user_meta( $user_id, 'bookmark', false ),
      'nonce'       => wp_create_nonce( 'bookmark_nonce' )
    ]
  );
  wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 
                'ajax_url'      => admin_url( 'admin-ajax.php' ), 
                'is_bookmarked'   => get_user_meta( $user_id, 'bookmark', false ),
                'nonce'         => wp_create_nonce( 'bookmark_nonce' ) 
                ) 
            );
}

add_action( 'wp_enqueue_scripts', 'bookmark_ajax_scripts' );


function add_bookmark() {
    $user_id = 2;

    check_ajax_referer( 'bookmark_nonce' );

    $bookmark = get_user_meta( $user_id, 'bookmark', true );

    if ( $bookmark === 'TRUE' ){
        $bookmark_update = 'FALSE';
    } else {
        $bookmark_update = 'TRUE';
    }

    $bookmark_update = update_user_meta( $user_id, 'bookmark', $bookmark_update, false );
    $success = get_user_meta( $user_id, 'bookmark', true );

    if( true == $success ) {
        $response['is_bookmarked'] = $success;
        $response['type'] = 'success';
    }

    $response = json_encode( $response );
    echo $response;
    die();
}

add_action( 'wp_ajax_add_bookmark', 'add_bookmark' );
add_action( 'wp_ajax_nopriv_add_bookmark', 'add_bookmark' );
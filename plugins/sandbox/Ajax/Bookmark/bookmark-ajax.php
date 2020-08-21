<?php

$bookmark = get_user_meta( $user_id, 'bookmark', false );

function bookmark_ajax_scripts() {

  wp_enqueue_script(
    'bookmark-frontend-js',
    plugin_dir_url( __FILE__ ) . '/assets/js/bookmark-ajax.js',
    ['jquery'],
    time(),
    true
  );    

  wp_localize_script(
    'bookmark-frontend-js',
    'bookmark_globals',
    [
      'ajax_url'      => admin_url( 'admin-ajax.php' ),
      'is_bookmarked' => get_user_meta( $user_id, 'bookmark', false ),
      'nonce'         => wp_create_nonce( 'bookmark_nonce' )
    ]
  );
}

add_action( 'wp_enqueue_scripts', 'bookmark_ajax_scripts' );


function add_bookmark() {
    $user_id = 2;
    
    // fetch post id
    $url     = wp_get_referer();
    $post_id = url_to_postid( $url );

    // nonce
    check_ajax_referer( 'bookmark_nonce' );

    $bookmark = get_user_meta( $user_id, 'bookmark', true );
    $bookmark_status = [];

    // Toggle Status
    if ( $bookmark['marked'] === true ){

        $bookmark_status = [ 
        'post_id' => $post_id, 
        'marked'  => false
        ];

    } else {

        $bookmark_status = [ 
          'post_id' => $post_id,
          'marked'  => true 
        ];

      }
    
    // Update Meta
    $bookmark_update = update_user_meta( $user_id, 'bookmark', $bookmark_status, false );
    $success = get_user_meta( $user_id, 'bookmark', true );
    
    
    $display_status = $bookmark_status['marked'] === true ? 'Unbookmark' : 'Bookmark';

    if( true == $success ) {
        $response['is_bookmarked'] = $display_status;
        $response['type'] = 'success';
    }

    $response = json_encode( $response );
    echo $response;

    die();
}

add_action( 'wp_ajax_add_bookmark', 'add_bookmark' );
add_action( 'wp_ajax_nopriv_add_bookmark', 'add_bookmark' );
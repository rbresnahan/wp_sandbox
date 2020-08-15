<?php

add_action("wp_ajax_my_user_bookmark", "my_user_bookmark");
add_action("wp_ajax_bookmark_this", "bookmark_this");
add_action("wp_ajax_nopriv_my_user_bookmark", "my_bookmark_login");



function bookmark_this() {

        
    
    if ( ! wp_verify_nonce( $_REQUEST['nonce'], "my_user_bookmark_nonce") ) {
        exit ( "No naughty business please" );
    }   
  
    $bookmark_meta = get_post_meta( $_REQUEST["post_id"], "bookmarks", true );
    $user_meta     = get_user_meta( 2, 'bookmark', false );

    // test
    $user_name  = 'teague';
    $user_url   = 'teague.com';
    $post_id    = $_REQUEST["post_id"];
    $marked     = true;

    $meta_data[] = $user_name;

    $new_data = [ 
        'name'   => $user_name,
        'url'    => $user_url,
        'id'     => $post_id,
        'marked' => $marked
    ];

    add_user_meta( 2, 'bookmark', $new_data );

    if( $bookmark === false ) {
        $result['type'] = "error";
        $result['bookmark'] = $bookmark_meta;
    } else {
        $result['type'] = "success";
        $post_id = get_the_ID();
        $result['bookmark'] = $post_id;
     }
  
    if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest') {
        $result = json_encode( $result );
        echo $result;
    } else {
        header( "Location: ".$_SERVER["HTTP_REFERER"] );
    }
  
    die();
}

function my_bookmark_login() {
   echo "You must log in to bookmark";
   die();
}

?>
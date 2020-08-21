<?php

get_header()
?>





</head>
<body>

<?php 
$post_id = $post->ID;
$user_id = get_current_user_id();
$user_bookmark_status = get_user_meta( 2, 'bookmark', false);

$current_bookmark_status = $user_bookmark_status[0]['marked'] ? 'Unbookmark' : 'Bookmark'; 

echo '<div id="status" ><a href="#like" class="bookmark-link" data-post_id="' . $post_id . '" ><span class="bookmark-status">' . $current_bookmark_status . '</span></a></div>';
?>
<hr>
<?php  

if ( $bookmark['post_id'] === $bookmark_status['post_id'] ) {
    $bookmark_update = update_user_meta( $user_id, 'bookmark', $bookmark_status, false );
  } else {
    $bookmark_update = add_user_meta( $user_id, 'bookmark', $bookmark_status, false );
  }

?>


<div class="wrapper">
    <div class="container center-of-page">
        <a href="">hello there</a>
    </div>
</div>


<?php
get_footer()
?>